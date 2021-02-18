<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\coupon;
use App\User;
use App\order;
use App\customer_info;
use App\buyInfo;
use App\billing_detail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');

    }

    public function coupon()
    {
        $allCoupon = coupon::all();
        return view('dashbord.pages.coupon', compact('allCoupon'));
    }

    function couponSave(Request $request)
    {
        $request->validate([
            'coupon_name' => 'unique:coupons,coupon_name',
            'coupon_discount' => 'numeric|max:99',
            'discount_type' => 'required|in:1,2',
            'valid_date' => 'required',
        ],
            [
                'valid_date.required' => 'The valid till must be a date',
            ]
        );

        $coupon = new coupon();
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_discount = $request->coupon_discount;
        $coupon->discount_type = $request->discount_type;
        $coupon->valid_date = $request->valid_date;
        $coupon->save();

        Session::flash('success', 'Coupon successfully added!');
        return back();
    }

    function couponDelete($id)
    {
        $couponDelete = coupon::findOrfail($id);
        $couponDelete->delete();
        return back();
    }

    //////customer login systems

    // function customerSave(Request $request)
    // {
    //   $validator = $this->validate($request,[
    //         'name' => 'required',
    //         'email' => 'required|unique:users',
    //         'password' => 'required',
    //         'number' => 'required',
    //         'address' => 'required',
    //         'gender' => 'required'
    //     ]);

    //   $userId =  User::insertGetId([
    //       'name'=>$request->name,
    //       'email'=>$request->email,
    //       'password'=>bcrypt($request->password),
    //       'roll_id' => 3,
    //       'created_at'=>Carbon::now(),
    //     ]);

    //   customer_info::insertGetId([
    //       'user_id'=> $userId,
    //       'number'=>$request->number,
    //       'address'=>$request->address,
    //       'gender'=>$request->gender
    //     ]);


    //     return back();
    // }

    function buyInfo(Request $request)
    {
        return $request->all();
        // $ip_address=$_SERVER['REMOTE_ADDR'];
        // buyInfo::nsertGetId([
        //     'customerIp'=> $ip_address,
        //     'grandTotal'=>$request->number,
        //     'discount'=>$request->address
        //   ]);
    }

    function order()
    {
        $allorder = order::latest()->get();
        return view('dashbord.order', compact('allorder'));
    }

    function orderDown(Request $request)
    {
        $status = $request->status;
        $order_id = $request->order_id;

        $getOrder = order::where('id', $order_id)->get();

        foreach ($getOrder as $getOr) {
            $invoice = $getOr->invoice;
            billing_detail::where('invoice', $invoice)->update([
                'status' => 0
            ]);
        }

        order::where('id', $order_id)->update([
            'status' => $status
        ]);


        return back()->with('status', 'Order Not Comform Yet !');
    }

    function orderUp(Request $request)
    {
        $status = $request->status;
        $order_id = $request->order_id;
        $getOrder = order::where('id', $order_id)->get();

        foreach ($getOrder as $getOr) {
            $invoice = $getOr->invoice;
            // return billing_detail::where('invoice', $invoice)->get();
            billing_detail::where('invoice', $invoice)->get();

            billing_detail::where('invoice', $invoice)->update([
                'status' => 1
            ]);

        }
        order::where('id', $order_id)->update([
            'status' => $status
        ]);
        // affiliate::

        return back()->with('status', 'Order complite !');
    }

    function orderPoductStatus(Request $request)
    {
        $orderIDDD = $request->orderIDDD;
        $orderProduct = $request->orderProduct;
        $getOrder = order::where('id', $orderIDDD)->first();
        order::where('id', $orderIDDD)->update([
            'status' => $orderProduct
        ]);

        Session::flash('success', 'Order successfully updated!');

        return back();
    }

    function changeAreaByAdmin(Request $request)
    {
        $orderIDDD = $request->orderIDDD;
        $change_area = $request->change_area;
        $getOrder = order::where('id', $orderIDDD)->first();

        if($change_area == order::INSIDE){
            $minus_fifty_from_grand_total = $getOrder->grandTotal - $getOrder->shiping;
            $plus_fifty_with_grand_total = $minus_fifty_from_grand_total + order::INSIDE;
            $total = $plus_fifty_with_grand_total;
        } else {
            $minus_hundred_from_grand_total = $getOrder->grandTotal - $getOrder->shiping;
            $plus_hundred_with_grand_total = $minus_hundred_from_grand_total + order::OUTSIDE;
            $total = $plus_hundred_with_grand_total;
        }

        order::where('id', $orderIDDD)->update([
            'grandTotal' => $total,
            'shiping' => $change_area,
        ]);

        Session::flash('success', 'Area successfully updated!');

        return back();
    }

    function orderConfram(Request $request)
    {
        $status = $request->status;
        $order_id = $request->order_id;
        $getOrder = order::where('id', $order_id)->get();

        foreach ($getOrder as $getOr) {
            $invoice = $getOr->invoice;
            // return billing_detail::where('invoice', $invoice)->get();
            billing_detail::where('invoice', $invoice)->get();

            billing_detail::where('invoice', $invoice)->update([
                'status' => 3
            ]);

        }
        order::where('id', $order_id)->update([
            'status' => $status
        ]);
        // affiliate::

        return back()->with('status', 'Order Comform !');
    }


    function userDataViewer($id)
    {
        $order = order::findOrfail($id);
        $orderId = $order->id;
        $userData = customer_info::where('order_id', $orderId)->first();
        return view('dashbord.userData', compact('userData'));
    }

    function userDataUpdate(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $number = $request->number;
        $address = $request->address;
        $userData = customer_info::where('id', $id)->update([
            'name' => $name,
            'number' => $number,
            'address' => $address,
        ]);
        return back();
    }

    public function orderDestroy($id)
    {
        $order_delete = order::findOrFail($id);
        $order_delete->delete();
        Session::flash('success', 'Successfully order deleted!');
        return back();
    }
}
