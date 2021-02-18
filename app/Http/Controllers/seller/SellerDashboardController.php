<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\product;
use App\User;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\size;
use App\affiliate;
use App\productAttr;
use App\seller_info;
use App\billing_detail;
use Carbon\Carbon;
use Image;
use Auth;

class SellerDashboardController extends Controller
{
    function sellerDashboard()
    {
        //  sellerName bill details
        $userId = Auth::user()->id;
        $seler_indo = seller_info::where('user_id', $userId)->first();

        $seller_unserName = $seler_indo->userName;

        $totalSellsProductPrice = billing_detail::where('sellerName', $seller_unserName)->where('status', 1)->sum('product_unite_price');
        $totalSellsProduct_quantity = billing_detail::where('sellerName', $seller_unserName)->where('status', 1)->sum('product_quantity');

        $totalSellsProduct = billing_detail::where('sellerName', $seller_unserName)->where('status', 1)->count();


        return view('seller.index', compact('totalSellsProductPrice', 'totalSellsProduct_quantity', 'totalSellsProduct'));
    }

    function login()
    {
        return view('seller.login');
    }

    function register()
    {
        return view('seller.register');
    }

    function sellerRegisterSave(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|max:40|unique:seller_infos'
        ]);

        $password = Hash::make($request->password);

        $lastinsertedid = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'roll_id' => 5
        ]);

        $seller_info = new seller_info();
        $seller_info->user_id = $lastinsertedid;
        $seller_info->userName = $request->username;
        $seller_info->email = $request->email;
        $seller_info->save();


        Auth::loginUsingId($lastinsertedid);
        return redirect()->route('seller-dashboard');

    }

    function forgot_password()
    {
        return view('seller.forgot-password');
    }

    ///product

    function sellerProduct()
    {
        $userId = Auth::user()->id;
        $seller_info = seller_info::where('user_id', $userId)->first();
        $sellerName = $seller_info->userName;
        $allproduct = product::where('sellerName', $sellerName)->get();
        return view('seller.product.index', compact('allproduct'));
    }

    function sellerProductAdd()
    {


        $allcategory = category::all();
        $allsubCategory = subCategory::all();
        $allthirdCategory = thirdCategory::all();
        return view('seller.product.add', compact('allcategory', 'allsubCategory', 'allthirdCategory'));

    }

    function sellerProductSave(Request $request)
    {
        $userId = Auth::user()->id;

        $seller_info = seller_info::where('user_id', $userId)->first();

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $request->validate([
            'category_id' => 'required',
            'subCategory_id' => 'required',
            'thirdCategory_id' => 'required',
            'product_name' => 'required|unique:products',
            'details' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $slug = make_slug($request->product_name);


        if ($request->hasFile('image')) {
            $main_photo = $request->image;
            $imagename = "product-" . uniqid() . "." . $main_photo->getClientOriginalExtension();
            Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/product/' . $imagename));
        }


        // $product = new product();
        // $product->category_id = $request->category_id;
        // $product->subCategory_id = $request->subCategory_id;
        // $product->thirdCategory_id = $request->thirdCategory_id;
        // $product->product_name = $request->product_name;
        // $product->details = $request->details;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->slug = $slug;
        // $product->image = $imagename;
        // $product->save();

        $lastinsertedid = product::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subCategory_id,
            'thirdCategory_id' => $request->thirdCategory_id,
            'product_name' => $request->product_name,
            'details' => $request->details,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => $slug,
            'image' => $imagename,
            'sellerName' => $seller_info->userName,
            'sellerId' => Auth::user()->roll_id,
            'status' => 0
        ]);


        return back()->with('status', 'Product  Add Successfully!');

    }

    function sellerProductAttr($id)
    {
        $product = product::where('id', $id)->first();
        $allSize = size::all();
        $productAttr = productAttr::where('product_id', $id)->get();
        return view('seller.product.productAttr', compact('product', 'allSize', 'productAttr'));
    }

    public function sellerProductAttrSave(Request $request)
    {
        $request->validate([
            'sizeName' => 'required'
        ]);

        $productAttr = new productAttr();
        $productAttr->product_id = $request->product_id;
        $productAttr->sizeName = $request->sizeName;
        $productAttr->save();
        return back()->with('status', 'Product Attr Add Successfully!');


    }

    function sizeNameseller(Request $request)
    {
        $request->validate([
            'sizeName' => 'required'
        ]);

        $size = new size();
        $size->sizeName = $request->sizeName;
        $size->save();

        return back()->with('status', 'Size Add Successfully!');
    }

    function sellerProductAttrDelete($id)
    {
        productAttr::where('id', $id)->delete();
        return back();
    }

    function sellerProductEdit($id)
    {
        $singleProduct = product::where('id', $id)->first();

        $allcategory = category::all();
        $allsubCategory = subCategory::all();
        $allthirdCategory = thirdCategory::all();
        return view('seller.product.edit', compact('allcategory', 'allsubCategory', 'allthirdCategory', 'singleProduct'));
    }

    function sellerProductupdate(Request $request, $id)
    {

        $userId = Auth::user()->id;
        $seller_info = seller_info::where('user_id', $userId)->first();
        $singleProduct = product::where('id', $id)->first();

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->product_name);
        $lastinsertedid = product::where('id', $id)->update([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subCategory_id,
            'thirdCategory_id' => $request->thirdCategory_id,
            'product_name' => $request->product_name,
            'details' => $request->details,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => $slug,

            'sellerName' => $seller_info->userName,
            'status' => 0
        ]);

        $image = $request->file('image');
        if (isset($image)) {
            $exitsname = $singleProduct->image;
            if ($exitsname != 'default.png') {
                // $nametodelete=product::where('id', $id)->image;
                unlink(base_path('public/upload/product/' . $exitsname));

            }
            $main_photo = $request->image;
            $imagename = "product-" . uniqid() . "." . $main_photo->getClientOriginalExtension();
            Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/product/' . $imagename));

        } else {
            $imagename = $singleProduct->image;
        }

        product::where('id', $id)->update([
            'image' => $imagename
        ]);


        return redirect()->route('seller-product')->with('status', 'Product Update Successfully!');

    }

    function sellerProductDelete($id)
    {
        $nametodelete = product::find($id)->image;
        unlink(base_path('public/upload/product/' . $nametodelete));
        product::where('id', $id)->delete();
    }

    ///////////////////////////////////subCategory

    public function categorySellerTosub(Request $request)
    {
        $category_id = $request->category_id;
        $allsubCategory = subCategory::where('category_id', $category_id)->get();
        $stringToSend = "<option>--Sub Category Name--</option>";
        foreach ($allsubCategory as $value) {
            // $value->name;
            $stringToSend .= "<option value='" . $value->id . "'>" . $value->subCategory_name . "</option>";
            // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
        }
        echo $stringToSend;

    }

    function subCategorySellerTothird(Request $request)
    {
        $subCategory_id = $request->subCategory_id;
        $allsubCategory = thirdCategory::where('sub_category_id', $subCategory_id)->get();
        $stringToSend = "<option>--Sub Category Name--</option>";
        foreach ($allsubCategory as $value) {
            // $value->name;
            $stringToSend .= "<option value='" . $value->id . "'>" . $value->thirdCategoryName . "</option>";
            // $stringtosend  .="<option value='". $city->id ."'>". $city->name ."</option>";
        }
        echo $stringToSend;
    }

    function sellerInformation()
    {
        return view('seller.information');
    }

    function sellerInfoSave(Request $request)
    {
        return $request->all();
    }

    function affiliate()
    {
        $id = Auth::user()->id;
        $user_information = seller_info::where('user_id', $id)->first();
        $userName = $user_information->userName;
        $getLinkAll = affiliate::where('username', $userName)->get();
        return view('seller.affiliate', compact('getLinkAll'));
    }

    function affiliateSave(Request $request)
    {
        // return "i Am from controller";

        $affiliate = new affiliate();
        $affiliate->affiliateLink = $request->affiliateLink;
        $affiliate->username = $request->username;
        $affiliate->save();


    }


    function sellerPayment()
    {

        // $currentMonthSell = DB::table('orders')
        //                     ->where('month', $currentMonth)
        //                     ->select("orders.date", "orders.month as month",
        //                       // DB::raw("SUM(CASE WHEN created_at >= NOW() - INTERVAL 1 WEEK THEN grand_total ELSE 0 END) weekly_sales"),
        //                       DB::raw("SUM(grandTotal) total_sales")
        //                     )
        //                     ->groupBy("orders.date")
        //                     ->groupBy("month")
        //                     // ->orderBy("month")
        //                     ->get();
        $user_id = Auth::user()->id;

        $user = seller_info::where('user_id', $user_id)->first();
        $promoteCount = billing_detail::where('promote', $user->userName)->count();
        return view('seller.sellerPayment', compact('promoteCount'));
    }

}
