<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\product;
use App\size;
use App\productAttr;
use App\order;
use App\billing_detail;
use App\customer_info;
use App\buyInfo;
use App\seller_info;
use App\paymentSeller;
use Carbon\Carbon;
class SellerController extends Controller
{
   function sellerIndex()
   {
   		$seller_info = seller_info::all();
   		return view('dashbord.seller.sellerIndex', compact('seller_info'));
   }
    function sellerInfo($userName)
   {
   	//	sellerName bill details
    $paymentSeller = paymentSeller::where('userName', $userName)->get();
    $paymentSellerPabe = paymentSeller::where('userName', $userName)->sum('amount');
        $currentMonth = Carbon::now()->format('F');
      $totalSellsProductPrice = billing_detail::where('sellerName', $userName)->where('status', 1)->sum('product_unite_price');
      $totalSellsProduct_quantity = billing_detail::where('sellerName', $userName)->where('status', 1)->sum('product_quantity');

      $totalSellsProduct = billing_detail::where('sellerName', $userName)->where('status', 1)->count();

   	$upApproveProduct = product::where('sellerName', $userName)->where('status', 0)->count();
   	$productcount = product::where('sellerName', $userName)->count();
   	$sellerProduct = product::where('sellerName', $userName)->get();
   		return view('dashbord.seller.sellerInfo', compact('upApproveProduct', 'productcount', 'sellerProduct', 'totalSellsProductPrice', 'totalSellsProduct_quantity', 'totalSellsProduct', 'userName', 'paymentSeller','paymentSellerPabe'));
   }

   function paymentSave(Request $request){

    $paymentSeller = new paymentSeller();
    $paymentSeller->date = $request->date;
    $paymentSeller->month = $request->month;
    $paymentSeller->year = $request->year;
    $paymentSeller->amount = $request->amount;
    $paymentSeller->payment_type = $request->payment_type;
    $paymentSeller->userName = $request->userName;
    $paymentSeller->save();

    return back()->with('status', 'Payment Add Succfully');

   }
}
