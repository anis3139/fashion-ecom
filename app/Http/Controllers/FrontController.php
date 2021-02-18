<?php

namespace App\Http\Controllers;

use App\CustomerMessage;
use App\SiteDesciption;
use App\SiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\banner;
use App\product;
use App\cart;
use App\coupon;
use App\User;
use App\test;
use App\order;
use App\customer_info;
use App\product_image;
use App\shipping;
use App\billing_detail;
use Carbon\Carbon;
use App\Comment;

use Image;
use Auth;
use Session;

class FrontController extends Controller
{
    public function index()
    {
        $promoteCategory = category::where('status', 1)->get();
        $promoteSubCategory = subCategory::where('status', 1)->get();
        $allcategory = category::all();
        $allbanner = banner::all();
        $promotedProduct = product::where('status', 1)->orderBy('updated_at', 'desc')->get();

        $hot_deal = product::where('hot_deal', 1)->orderBy('updated_at', 'desc')->get();
        $hot_deal2 = product::where('hot_deal', 1)->inRandomOrder()->get();

        $site_description = SiteDesciption::first();

        $category = category::orderBy('updated_at', 'desc')->take(20)->get();

        return view('fronts.index', compact('allcategory', 'allbanner', 'promotedProduct', 'promoteCategory', 'promoteSubCategory', 'hot_deal', 'hot_deal2', 'site_description', 'category'));
    }

    public function index1()
    {
        $promoteCategory = category::where('status', 1)->get();
        $promoteSubCategory = subCategory::where('status', 1)->get();
        $allcategory = category::all();

        return view('fronts.index', compact('allcategory', 'promoteCategory', 'promoteSubCategory'));
    }

    public function mobile()
    {
        $promoteCategory = category::where('status', 1)->get();
        $promoteSubCategory = subCategory::where('status', 1)->get();
        $allcategory = category::all();
        $allbanner = banner::all();
        $promotedProduct = product::where('status', 1)->get();

        $hot_deal = product::where('hot_deal', 1)->orderBy('created_at', 'desc')->get();
        $hot_deal2 = product::where('hot_deal', 1)->inRandomOrder()->get();

        return view('fronts.mobile.index', compact('allcategory', 'allbanner', 'promotedProduct', 'promoteCategory', 'promoteSubCategory', 'hot_deal', 'hot_deal2'));
    }

    public function more_data(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = 6;
            $newFileUpload = product::skip($skip)->take($take)->get();
            return response()->json($newFileUpload);
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function about()
    {
        return view('fronts.about');
    }

    public function mobile_subcategory()
    {
        return view('fronts.mobile.allcategory');
    }

    public function privice()
    {
        return view('fronts.privice');
    }

    public function trems()
    {
        return view('fronts.trems');
    }

    public function shop()
    {
        $allProduct = product::where('status', 1)->paginate(18);
        return view('fronts.shop', compact('allProduct'));
    }

    public function underSubCat($sub_cat_slug)
    {
        $category = category::where('slug', $sub_cat_slug)->first();
        $title = $category->page_title;
        $description_title = $category->description_title;
        $description = $category->description;
        $categoryID = $category->id;

        $orderByColumn = 'updated_at';
        $orderByDirection = 'desc';

        if (request()->filter == 'নতুন') {
            $orderByColumn = 'updated_at';
            $orderByDirection = 'desc';
        } elseif (request()->filter == 'জনপ্রিয়') {
            $orderByColumn = 'hot_deal';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-কম-থেকে-বেশী') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-বেশী-থেকে-কম') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'desc';
        }

        $all_category_panel = subCategory::where('category_id', $categoryID)->get();

        $count_product = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where('category_id', $categoryID)->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->get();

        $allProduct = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where('category_id', $categoryID)->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->paginate(18);

        return view('fronts.shop', compact('allProduct', 'title', 'category', 'all_category_panel', 'description_title', 'description', 'count_product'));
    }

    public function sub_category($cat_slug, $sub_cat_slug)
    {
        $category = category::where('slug', $cat_slug)->first();
        $categoryId = $category->id;

        $subCategory = subCategory::where('slug', $sub_cat_slug)->first();
        $title = $subCategory->page_title;
        $description_title = $subCategory->description_title;
        $description = $subCategory->description;

        $subCategoryID = $subCategory->id;

        $orderByColumn = 'updated_at';
        $orderByDirection = 'desc';

        if (request()->filter == 'নতুন') {
            $orderByColumn = 'updated_at';
            $orderByDirection = 'desc';
        } elseif (request()->filter == 'জনপ্রিয়') {
            $orderByColumn = 'hot_deal';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-কম-থেকে-বেশী') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-বেশী-থেকে-কম') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'desc';
        }

        $all_sub_category_panel = thirdCategory::where('sub_category_id', $subCategoryID)->get();

        $count_product = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where('sub_category_id', $subCategoryID)->where('category_id', $categoryId)
            ->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->get();

        $allProduct = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where('sub_category_id', $subCategoryID)->where('category_id', $categoryId)
            ->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->paginate(18);

        return view('fronts.shop', compact('allProduct', 'title', 'category', 'all_sub_category_panel', 'description_title', 'description', 'count_product'));
    }


    public function subCategoryLast($cat_slug, $sub_cat_slug, $third_slug)
    {
        $category = category::where('slug', $cat_slug)->first();
        $categoryId = $category->id;

        $subCategory = subCategory::where('slug', $sub_cat_slug)->first();
        $subCategoryID = $subCategory->id;

        $thirdCategory = thirdCategory::where('slug', $third_slug)->first();
        $title = $thirdCategory->page_title;
        $description_title = $thirdCategory->description_title;
        $description = $thirdCategory->description;
        $thirdCategoryID = $thirdCategory->id;

        $orderByColumn = 'updated_at';
        $orderByDirection = 'desc';

        if (request()->filter == 'নতুন') {
            $orderByColumn = 'updated_at';
            $orderByDirection = 'desc';
        } elseif (request()->filter == 'জনপ্রিয়') {
            $orderByColumn = 'hot_deal';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-কম-থেকে-বেশী') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'asc';
        } elseif (request()->filter == 'দাম-সবচেয়ে-বেশী-থেকে-কম') {
            $orderByColumn = 'new_price';
            $orderByDirection = 'desc';
        }

        $count_product = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where(['category_id' => $categoryId, 'sub_category_id' => $subCategoryID, 'thirdCategory_id' => $thirdCategoryID])
            ->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->get();

        $allProduct = product::select(DB::raw('*,IF(offer_price IS NULL, price, offer_price) as new_price'))
            ->where(['category_id' => $categoryId, 'sub_category_id' => $subCategoryID, 'thirdCategory_id' => $thirdCategoryID])
            ->where('status', 1)->orderBy($orderByColumn,$orderByDirection)->paginate(18);

        return view('fronts.shop', compact('allProduct', 'title', 'category', 'description_title', 'description', 'count_product'));
    }

    public function getHotDealProduct()
    {
        return view('fronts.hot_deal')
            ->with('title', 'Hot Deal Product')
            ->with('count_product',  product::where('status', 1)->where('hot_deal', 1)->get())
            ->with('allProduct',  product::where('status', 1)->where('hot_deal', 1)->paginate(18));
    }

    public function singleCategory($slug)
    {
        $category = category::where('slug', $slug)->first();
        $categoryId = $category->id;
        $allProduct = product::where('category_id', $categoryId)->where('status', 1)->paginate(18);
        return view('fronts.shop', compact('allProduct'));
    }


    public function prductView($slug)
    {
        $singleProduct = product::where('slug', $slug)->first();
        $product_id = $singleProduct->id;
        $comment = Comment::all();
        $site_info = SiteInfo::first();

        $producGallery = product_image::where('product_id', $product_id)->pluck('gallery');

        $images = collect();
        foreach ($producGallery as $key) {
            $images = explode('|', $key);
        }

        return view('fronts.single', compact('singleProduct', 'images', 'comment', 'site_info'));
    }


    public function admin()
    {
        return view('fronts.admin');
    }

    function ami(Request $request)
    {
        return $request->all();
    }

    function cartUpdate(Request $request)
    {
        $id = $request->quantity;

        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    function categoryViewProduct($id)
    {
        $allProduct = product::where('thirdCategory_id', $id)->where('status', 1)->paginate(18);
        return view('fronts.shop', compact('allProduct'));
    }

    public function cart($coupon_name = "")
    {
        /*if (!Auth::check()) {
            Session::flash('warning', 'Please login first!');
            return back();
        }*/

        if ($coupon_name == "") {
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $cartProduct = cart::where('customerIP', $ip_address)->get();
            // foreach($cartProduct as $value){
            //   return $value;
            // }
            $coupon_discount_amount = 0;
            $coupon_discount_type = 'NULL';
            return view('fronts.checkout', compact('cartProduct', 'coupon_discount_amount', 'coupon_discount_type'));
        } else {
            $coupon_percentage_exist = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::PERCENTAGE)->exists();
            $coupon_amount_exist = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::AMOUNT)->exists();
            if ($coupon_percentage_exist) {
                if (Carbon::now()->format('Y-m-d') <= coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::PERCENTAGE)->first()->valid_date) {
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $cartProduct = cart::where('customerIP', $ip_address)->get();
                    $coupon_discount_amount = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::PERCENTAGE)->first()->coupon_discount;
                    $coupon_name = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::PERCENTAGE)->first()->coupon_name;
                    $coupon_discount_type = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::PERCENTAGE)->first()->discount_type;
                    return view('fronts.checkout', compact('cartProduct', 'coupon_discount_amount', 'coupon_discount_type', 'coupon_name'));
                } else {
                    Session::flash('info', 'Sorry this coupon not available at this moment!');
                    return back();
                }
            } elseif ($coupon_amount_exist) {
                if (Carbon::now()->format('Y-m-d') <= coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::AMOUNT)->first()->valid_date) {
                    $ip_address = $_SERVER['REMOTE_ADDR'];
                    $cartProduct = cart::where('customerIP', $ip_address)->get();
                    $coupon_discount_amount = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::AMOUNT)->first()->coupon_discount;
                    $coupon_name = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::AMOUNT)->first()->coupon_name;
                    $coupon_discount_type = coupon::where('coupon_name', $coupon_name)->where('discount_type', coupon::AMOUNT)->first()->discount_type;
                    return view('fronts.checkout', compact('cartProduct', 'coupon_discount_amount', 'coupon_discount_type', 'coupon_name'));
                } else {
                    Session::flash('info', 'Sorry this coupon not available at this moment!');
                    return back();
                }
            } else {
                Session::flash('error', 'Invalid coupon! Please try correct coupon!');
                return back();
            }
        }
    }


    public function cartSave($id, $productAttrValue = "")
    {
        $product = product::find($id);

        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {

            if ($product->offer_price){
                $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->offer_price,
                        "image" => $product->image,
                        "size" => $productAttrValue
                    ]
                ];
            } else {
                $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image,
                        "size" => $productAttrValue
                    ]
                ];
            }

            session()->put('cart', $cart);
            return redirect()->back();
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1

        if ($product->offer_price) {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->offer_price,
                "image" => $product->image,
                "size" => $productAttrValue
            ];
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "size" => $productAttrValue
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    function orderNow($id)
    {
        $product = product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {
            if ($product->offer_price) {
                $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->offer_price,
                        "image" => $product->image,
                        "size" => 'default'
                    ]
                ];
            } else {
                $cart = [
                    $id => [
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image,
                        "size" => 'default'
                    ]
                ];
            }

            session()->put('cart', $cart);

            if (Auth::check()){
                return redirect()->route('cart');
            } else {
                return redirect()->route('customer_login');
            }
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);

            if (Auth::check()){
                return redirect()->route('cart');
            } else {
                return redirect()->route('customer_login');
            }
        }

        // if item not exist in cart then add to cart with quantity = 1
        if ($product->offer_price) {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->offer_price,
                "image" => $product->image,
                "size" => 'default'
            ];
        } else {
            $cart[$id] = [
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "size" => 'default'
            ];
        }

        session()->put('cart', $cart);

        if (Auth::check()){
            return redirect()->route('cart');
        } else {
            return redirect()->route('customer_login');
        }
    }

    function cartDelete($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function seller()
    {
        return view('fronts.seller');
    }

    public function service()
    {
        return view('fronts.service');
    }

    public function contact()
    {
        return view('fronts.contact')
            ->with('site_info', SiteInfo::first());
    }

    public function storeCustomerMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:190',
            'mobile_no' => 'required|min:11|max:18',
            'message' => 'required|min:10',
        ]);

        CustomerMessage::create($request->all());
        Session::flash('success', 'Successfully message sent!');
        return back();
    }

    public function customer_login()
    {
        return view('fronts.customer_register');
    }

    public function customerRegister()
    {
        return view('fronts.user_customer_register');
    }

    function customerSaveForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'number' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $userId = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roll_id' => 3,
            'created_at' => Carbon::now(),
        ]);

        customer_info::insertGetId([
            'name' => $request->name,
            'user_id' => $userId,
            'number' => $request->number,
            'address' => $request->address,
            'gender' => $request->gender
        ]);

        Auth::loginUsingId($userId);

        $shipping_btn = $request->shipping_btn;

        if ($shipping_btn == "shipping_btn") {
            return redirect()->route('shiping');
        }

        return redirect()->route('customer-dashboard');
    }

    function customerUpdateForm(Request $request, $id)
    {
        $id = Auth::id();
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'number' => 'required',
            'address' => 'required',
            'gender' => 'required'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        customer_info::where('user_id', $user->id)->update([
            'name' => $request->name,
            'user_id' => $id,
            'number' => $request->number,
            'address' => $request->address,
            'gender' => $request->gender
        ]);

        Session::flash('info', 'Your information updated successfully');
        return back();
    }

    public function trackorder()
    {
        return view('fronts.trackorder');
    }

    function trackValue($invoiceNumber)
    {
        $trackingOrder = order::where('invoice', $invoiceNumber)->first();
        return view('fronts.trackValue', compact('trackingOrder'));
    }

    public function shiping()
    {
        return view('fronts.shiping');
    }

    public function refriend()
    {
        return view('fronts.refriend');
    }

    public function order_format()
    {
        return view('fronts.order_format');
    }

    public function bikas()
    {
        return view('fronts.bikas');
    }


    public function thirdCategoryView()
    {
        return view('auth.custo');
    }

    public function thirdCategorySaver(Request $request)
    {
        $password = Hash::make($request->password);

        $lastinsertedid = User::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'roll_id' => 10
        ]);

        Auth::loginUsingId($lastinsertedid);
        return back();

    }

    function allcategorynav()
    {
        $allcategory = category::all();
        return view('fronts.allcategorynav', compact('allcategory'));
    }

    function headerNave()
    {
        $allcategory = category::all();
        return view('fronts.master', compact('allcategory'));
    }

    function test()
    {
        $collection = test::all()->pluck('image');
        $allImageSHow = test::all();

        foreach ($collection as $key) {

            $images = explode('|', $key);
        }
        return view('testForm', compact('images', 'allImageSHow'));
    }


    function testSave(Request $request)
    {
        $insert = $request->all();
        $images = array();

        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                // $name=$file->getClientOriginalName();
                $name = "product-" . uniqid() . "." . $file->getClientOriginalExtension();
                Image::make($file)->resize(330, 319)->save(base_path('public/upload/ami/' . $name));
                // $file->move('image',$name);
                $images[] = $name;
            }
        }

        test::insert([
            'image' => implode("|", $images),
            'name' => $insert['name'],
            //you can put other insertion here
        ]);

        return back();
    }

    public function filter(Request $request)
    {
        $product = product::where('category_id', $request->categoryID);
        if ($request->has('subCategoryId')) {
            $product->where('sub_category_id', $request->subCategoryId);
        }
        if ($request->has('price')) {
            $product->where('price', '<=', $request->price);
        }
        $product->get();
        $allProduct = $product->paginate(18);
        return view('fronts.shop', compact('allProduct'));
    }

    public function quickOrderSave(Request $request)
    {
        $numberST = mt_rand(100, 30001);
        $numberrand = str_random(5);
        $invoice = 'IN-' . $numberST . '001' . $numberrand;

        $shipping_id = shipping::insertGetId([
            'user_id' => Auth::id(),
            'quick_name' => $request->name,
            'phone' => $request->number,
            'address' => $request->address,
            /*'country_id' => 19,
            'city_id' => 20,
            'zipCode' => 1212,*/
            'payment' => shipping::CASH_ON_DELIVERY,
            'invoice' => $invoice,
            'created_at' => Carbon::now(),
        ]);

        $order = order::insertGetId([
            'shipping_id' => $shipping_id,
            'user_id' => Auth::id(),
            'invoice' => $invoice,
            'grandTotal' => $request->grandTotalSave,
            'shiping' => $request->shipingSave,
            'payment' => shipping::CASH_ON_DELIVERY, /* from quick order */
            'month' => $request->month,
            'year' => $request->year,
            'date' => $request->date,
            'number' => $request->number,
            'status' => order::PENDING,
            'created_at' => Carbon::now(),
        ]);

        $customer_info = customer_info::insertGetId([
            'name' => $request->name,
            'number' => $request->number,
            'order_id' => $order,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        $cart = session()->get('cart');
        if (is_array(session('cart')) || is_object(session('cart'))) {
            foreach (session('cart') as $id => $details) {
                billing_detail::insert([
                    'sale_id' => $shipping_id,
                    'product_id' => $id,
                    'product_unite_price' => $details['price'],
                    'product_quantity' => 1,
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

        return view('fronts.ordercomplite', compact('invoice'));
    }

    public function trackingOrder(Request $request)
    {
        $query = $request->q;

        $getOrder = order::where('invoice', $query)->orwhere('number', $query)->get();
        return view('fronts.trackValueView', compact('getOrder'));
    }

    public function countCart()
    {
        return "sldkf";
    }

    public function ordercomplite()
    {
        return view('fronts.ordercomplite');
    }
}


