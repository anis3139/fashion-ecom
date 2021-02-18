<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\country;
use App\shipping;
use App\city;
use App\cart;
use App\order;
use App\billing_detail;
use App\product;
use Carbon\Carbon;
use Auth;
use Session;

class CheckoutController extends Controller
{
    public function __construct()
    {


        // $this->middleware('CustomerRegister');

        // $this->middleware('SellerChecker');
        // $this->middleware('auth');

    }

    function checkoutValue(Request $request)
    {
        $request->validate([
            'grandTotal' => 'required'
        ]);

        $grandTotal = $request->grandTotal;

        /*if (!Auth::check()) {
            return redirect()->route('customer_login');
        }*/

        return view('fronts.shiping', compact('grandTotal'));
    }

    function cityView(Request $request)
    {
        $countryId = $request->country_id;
        $allCity = city::where('country_id', $countryId)->get();
        $stringToSend = "<option>--City Name--</option>";
        foreach ($allCity as $value) {
            // $value->name;
            $stringToSend .= "<option value='" . $value->id . "'>" . $value->name . "</option>";
            // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
        }
        echo $stringToSend;

    }

    public function orderSave(Request $request)
    {
        $numberST = mt_rand(100, 30001);
        $numberrand = str_random(5);
        $invoice = 'IN-' . $numberST . '001' . $numberrand;

        $shipping_id = shipping::insertGetId([
            'user_id' => Auth::id(),
            'quick_name' => $request->name,
            'address' => $request->address,
            'phone' => $request->number,
            /*'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'region' => $request->region,
            'zipCode' => $request->zipCode,*/
            'payment' => $request->payment,
            'invoice' => $invoice,
            'created_at' => Carbon::now(),
        ]);

        $order = order::insertGetId([
            'shipping_id' => $shipping_id,
            'user_id' => Auth::id(),
            'invoice' => $invoice,
            'grandTotal' => $request->grandTotalSave,
            'shiping' => $request->shipingSave,
            'number' => $request->number,
            'payment' => $request->payment,
            'month' => $request->month,
            'year' => $request->year,
            'date' => $request->date,
            'status' => order::PENDING,
            'created_at' => Carbon::now(),
        ]);
        $ip_address = $_SERVER['REMOTE_ADDR'];

        // $cartProduct = cart::where('customerIP', $ip_address)->get();

        $cart = session()->get('cart');
        if (is_array(session('cart')) || is_object(session('cart'))) {
            foreach (session('cart') as $id => $details) {
                billing_detail::insert([
                    'sale_id' => $shipping_id,
                    'product_id' => $id,
                    'product_unite_price' => $details['price'],
                    'product_quantity' => $details['quantity'],
                    'size' => $details['size'],
                    'invoice' => $invoice,
                    'date' => $request->date,
                    'month' => $request->month,
                    'sellerName' => product::find($id)->sellerName,
                    'sellerId' => product::find($id)->sellerId,
                    'created_at' => Carbon::now(),
                ]);

                product::find($id)->decrement('quantity', $details['quantity']);
                Session::forget('cart');
            }
        }

        if (Auth::check()) {
            if ($request->payment == 1) {
                return redirect()->to('/customer-dashboard');
            } elseif ($request->payment == 2) {
                return view('fronts.payment', compact('invoice'));
            }
        } else {
            return view('fronts.ordercomplite', compact('invoice'));
        }
    }

    function savePayment(Request $request)
    {
        $request->all();
        $trxID = $request->trxID;
        $invoice = $request->invoice;
        // return  order::where('invoice', $invoice)->first();
        order::where('invoice', $invoice)->update([
            'trxID' => $trxID
        ]);
        return redirect()->to('/customer-dashboard');
    }


    function trackingPoduct(Request $request, $id)
    {
        $trackingProduct = $request->trackingProduct;
        order::where('id', $id)->update([
            'trackingProduct' => $trackingProduct
        ]);

        return back();
    }

    public function payment()
    {
        return view('fronts.payment');
    }
}
