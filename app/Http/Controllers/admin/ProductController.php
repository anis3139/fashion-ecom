<?php

namespace App\Http\Controllers\admin;

use App\ProductDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\product;
use App\size;
use App\productAttr;
use App\product_image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
    }

    public function index()
    {
        $allcategory = category::all();
        $allsubCategory = subCategory::all();
        $allthirdCategory = thirdCategory::all();
        return view('dashbord.product.index', compact('allcategory', 'allsubCategory', 'allthirdCategory'));
    }

    public function productIndex()
    {
        $allproduct = product::where('status', 1)->orderBy('id', 'desc')->get();
        return view('dashbord.product.productIndex', compact('allproduct'));
    }

    public function productAttr($id)
    {
        $product = product::where('id', $id)->first();
        $allSize = size::all();
        $productAttr = productAttr::where('product_id', $id)->get();
        return view('dashbord.product.productAttr', compact('product', 'allSize', 'productAttr'));
    }

    public function productAttrSave(Request $request)
    {
        $request->validate([
            'sizeName' => 'required'
        ]);

        $productAttr = new productAttr();
        $productAttr->product_id = $request->product_id;
        $productAttr->sizeName = $request->sizeName;
        $productAttr->save();

        Session::flash('success', 'Product Attr Add Successfully!');
        return back();
    }

    public function sizeName(Request $request)
    {

        $request->validate([
            'sizeName' => 'required'
        ]);

        $size = new size();
        $size->sizeName = $request->sizeName;
        $size->save();

        Session::flash('success', 'Size Add Successfully!');
        return back();

    }

    public function productSave(Request $request)
    {
        return $request->all();

        $this->validate($request, [
            'gallery' => 'required',
        ]);

        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'product_code' => 'required|unique:products',
            'quantity' => 'required',
        ]);

        $slug = make_slug($request->product_name.'-'.$request->product_code);

        if ($request->hasFile('image')) {
            $main_photo = $request->image;
            $imagename = "product-" . uniqid() . "." . $main_photo->getClientOriginalExtension();
            Image::make($main_photo)->resize(330, 319)->save(base_path('public/upload/product/' . $imagename));
        }

        $lastinsertedid = product::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->subCategory_id,
            'thirdCategory_id' => $request->thirdCategory_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'offer_price' => $request->offer_price,
            'product_code' => $request->product_code,
            'quantity' => $request->quantity,
            'slug' => $slug,
            'image' => $imagename,
            'status' => $request->status,
            'hot_deal' => $request->hot_deal,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $product_details = [];

        foreach($request->details as $single_details){
            $product_details[] = [
                'product_id' => $lastinsertedid,
                'details' => $single_details,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        ProductDetails::insert($product_details);

        $images = array();
        if ($files = $request->file('gallery')) {
            foreach ($files as $file) {
                // $name=$file->getClientOriginalName();
                $name = "product-" . uniqid() . "." . $file->getClientOriginalExtension();
                Image::make($file)->resize(1024, 910)->save(base_path('public/upload/ami/' . $name));
                $images[] = $name;
            }
        }

        $productGallery = product_image::insertGetId([
            'product_id' => $lastinsertedid,
            'gallery' => implode("|", $images)
        ]);

        Session::flash('success', 'Product added successfully!');
        return back();
    }


    function productEdit($id)
    {
        $singleProduct = product::where('id', $id)->first();
        $allcategory = category::all();
        $allsubCategory = subCategory::all();
        $allthirdCategory = thirdCategory::all();
        return view('dashbord.product.productEdit', compact('allcategory', 'allsubCategory', 'allthirdCategory', 'singleProduct'));
    }

    function productUpdate(Request $request, $id)
    {
        $singleProduct = product::where('id', $id)->first();

        $this->validate($request, [
            'product_code' => 'required|unique:products,product_code,'.$id,
        ]);

        /* make slug */
        function make_slug($string)
        {
            return preg_replace('/\s+/u', '-', trim($string));
        }

        $slug = make_slug($request->product_name.'-'.$request->product_code);

        $singleProduct->category_id = $request->category_id;
        $singleProduct->sub_category_id = $request->subCategory_id;
        $singleProduct->thirdCategory_id = $request->thirdCategory_id;
        $singleProduct->product_name = $request->product_name;
        $singleProduct->price = $request->price;
        $singleProduct->offer_price = $request->offer_price;
        $singleProduct->product_code = $request->product_code;
        $singleProduct->quantity = $request->quantity;
        $singleProduct->slug = $slug;
        $singleProduct->hot_deal = $request->hot_deal;
        $singleProduct->status = 1;
        $singleProduct->updated_at = Carbon::now();

        if ($image = $request->file('image')) {
            $image_name = "product-" . uniqid() . "." . $image->getClientOriginalExtension();
            unlink(product::ATTACH_UPLOAD_PATH . '/' . $singleProduct->getOriginal('image'));
            Image::make($image)->resize(330, 319)->save(product::ATTACH_UPLOAD_PATH . '/' . $image_name);
            $singleProduct['image'] = $image_name;
        }

        $product_details = [];

        if (is_array($request->details) || $request->details)
        {
            foreach($request->details as $single_details){
                $product_details[] = [
                    'product_id' => $singleProduct->id,
                    'details' => $single_details,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        ProductDetails::insert($product_details);

        $singleProduct->save();
        Session::flash('success', 'Product Update Successfully!');
        return redirect()->route('productIndex');
    }

    public function productDelete($id)
    {
        $nametodelete = product::find($id)->image;
        unlink(base_path('public/upload/product/' . $nametodelete));
        product::where('id', $id)->delete();
    }

    //product size delete
    public function destroyProductSize($id)
    {
        $product_size = productAttr::findOrFail($id);
        $product_size->delete();
        Session::flash('success', 'Product size deleted successfully!');
        return back();
    }

    //approveProduct
    function approveProduct()
    {
        $approveProduct = product::where('status', 0)->get();
        return view('dashbord.product.approve.index', compact('approveProduct'));
    }

    function productapprove(Request $request)
    {
        $status = $request->status;
        $id = $request->product_id;
        product::where('id', $id)->update([
            'status' => $status
        ]);
        return back()->with('status', 'Product  Approve Successfully!');
    }

    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }


    function promoteProduct($id)
    {
        $productDetails = product::where('id', $id)->first();
        $offer_price = $productDetails->offer_price;
        $price = $productDetails->price;

        $promoteProduct = product::find($id)->update([
            'offer_price' => $price,
            'price' => $offer_price,
        ]);
        return back();
    }

    function depromoteProduct($id)
    {
        $productDetails = product::where('id', $id)->first();
        $offer_price = $productDetails->offer_price;
        $price = $productDetails->price;

        $promoteProduct = product::find($id)->update([
            'offer_price' => $price,
            'price' => $offer_price,
        ]);
        return back();
    }

    public function productDetailsUpdate(Request $request, ProductDetails $productDetails)
    {
        $productDetails->update([
            'details' => $request->details,
        ]);
    }

    public function productDetailsDelete(ProductDetails $productDetails)
    {
        $productDetails->delete();
    }

    public function editMultipleImage($id)
    {
        $product_image = product::findOrFail($id)->productImage;

        if(!empty($product_image)) {
            $images = explode('|', $product_image->gallery);
        } else {
            Session::flash('error', 'Something went wrong!');
            return back();
        }
        return view('dashbord.product.edit_multi_img', compact('product_image', 'images'));
    }

    public function updateMultipleImage(Request $request, $id)
    {
        $product_gallery = product_image::findOrFail($id);

        if ($request->file('gallery')) {
            $images = array();
            if ($files = $request->file('gallery')) {
                foreach ($files as $file) {
                    $name = "product-" . uniqid() . "." . $file->getClientOriginalExtension();
                    Image::make($file)->resize(1024, 910)->save(base_path('public/upload/ami/' . $name));
                    $images[] = $name;
                }
            }

            $product_gallery->update([
                'product_id' => $request->product_id,
                'gallery' => implode("|", $images),
                'updated_at' => Carbon::now(),
            ]);

            Session::flash('success', 'Product gallery image updated successfully.');
            return back();
        } else {
            Session::flash('warning', 'Nothing to update!');
            return back();
        }
    }
}
