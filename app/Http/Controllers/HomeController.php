<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subCategory;
use App\order;
use paginate;
use Carbon\Carbon;
use App\complain;
use App\photo;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentMonth = Carbon::now()->format('F');
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterdaytDate = Carbon::yesterday()->toDateString();

        $allcategory = subCategory::paginate(10);
        $monthTotal = order::where('month', $currentMonth)->where('status', 1)->sum('grandTotal');
        $todayTotal = order::where('date', $currentDate)->where('status', 1)->sum('grandTotal');
        $lifeRimeTotal = order::where('status', 1)->sum('grandTotal');
        $orderCountToday = order::where('date', $currentDate)->where('status', 1)->count();
        $orderCountYestaday = order::where('date', $yesterdaytDate)->where('status', 1)->count();
        $complains = complain::latest()->paginate(5);

        return view('dashbord.home', compact('allcategory', 'monthTotal', 'todayTotal', 'lifeRimeTotal', 'orderCountToday', 'orderCountYestaday', 'complains'));
    }

    public function catDown(Request $request)
    {
        $status = $request->status;
        $category_id = $request->category_id;

        subCategory::where('id', $category_id)->update([
            'status' => $status
        ]);
        return back();
    }

    public function catUp(Request $request)
    {
        $status = $request->status;
        $category_id = $request->category_id;

        subCategory::where('id', $category_id)->update([
            'status' => $status
        ]);
        return back();
    }


    function promoteImage(Request $request)
    {

        $images = array();

        if ($files = $request->file('photo')) {
            foreach ($files as $file) {
                $name = "product-" . uniqid() . "." . $file->getClientOriginalExtension();
                Image::make($file)->resize(1000, 1000)->save(base_path('public/upload/promote/' . $name));
                $images[] = $name;
            }
        }

        $productGallery = photo::insertGetId([
            'promote_id' => $request->id,
            'image' => implode("|", $images)
        ]);
        return back()->with('status', 'Product  Add Successfully!');

    }

    function addPromo($id)
    {
        return subCategory::where('id', $id)->first();
    }


}
