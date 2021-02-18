<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\order;
use App\billing_detail;
use App\customer_info;
use App\shipping;
use App\User;

class AddController extends Controller
{
    /*public function invoice($invoice)
    {
        $order = order::where('invoice', $invoice)->first();
        // return $order->grandTotal;
        $billing_detail = billing_detail::where('invoice', $invoice)->get();
        return view('dashbord.invoice', compact('order', 'billing_detail'));
    }*/

    public function customerInvoice($invoice)
    {
        $order = order::where('invoice', $invoice)->first();
        // return $order->grandTotal;
        $billing_detail = billing_detail::where('invoice', $invoice)->get();
        return view('dashbord.invoice', compact('order', 'billing_detail'));
    }

    public function invoice($invoice)
    {
        $order = order::where('invoice', $invoice)->first();
        // return $order->grandTotal;
        $billing_detail = billing_detail::where('invoice', $invoice)->get();
        return view('dashbord.partials.invoice_modal', compact('order', 'billing_detail'));
    }

    public function invoicePrint($invoice)
    {
        $order = order::where('invoice', $invoice)->first();
        // return $order->grandTotal;
        $billing_detail = billing_detail::where('invoice', $invoice)->get();
        return view('dashbord.partials.invoice_print', compact('order', 'billing_detail'));
    }

    public function index()
    {
    }

    public function store(Request $request)
    {

        $data = [
            'cates' => $request->input('cates'),
            'subcats' => $request->input('manu_1'),
            'subcats2' => $request->input('manu'),


        ];
        DB::table('addcatagory')->insert($data);

        // $categories = new Add_Category ;
        // $categories-> catsname= $ruquest->cates;
        // $categories-> sub_cates= $ruquest->subcates;
        // $categories-> manu= $ruquest->sub_cates_2;
        // $categories->save();
    }

    function customerIndex()
    {
        $allCustomer = User::where('roll_id', 3)->get();
        return view('dashbord.customer', compact('allCustomer'));
    }


}
