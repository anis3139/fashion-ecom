<?php

namespace App\Http\Controllers;

use Image;
use App\Banner;
use App\SiteInfo;
use Carbon\Carbon;
use App\SiteDesciption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('RoleChecker');
        $this->middleware('SellerChecker');
    }

    public function addBanner()
    {
        $allbanner = banner::all();
        return view('dashbord.pages.slider', compact('allbanner'));
    }


    public function bannerSave(Request $request)
    {
        $request->validate([
            'image' => 'required',

        ]);
        if ($request->hasFile('image')) {
            $main_photo = $request->image;
            $imagename = "banner-" . uniqid() . "." . $main_photo->getClientOriginalExtension();

            // $ami =  app_path('store.gochange-tech.com/uploads/products_images/'.$imagename);
            //      dd($ami);

            Image::make($main_photo)->resize(1010, 265)->save(base_path('public/upload/banner/' . $imagename));

        }


        $lastinsertedid = Banner::insertGetId([
            'image' => $imagename,
            'title' => $request->title,
            'link' => $request->link,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        return back()->with('status', 'Banner Upload Successfully');
    }

    public function bannerDelete($id)
    {
        $nametodelete = banner::find($id)->image;
        unlink(base_path('public/upload/banner/' . $nametodelete));
        banner::where('id', $id)->delete();
    }

    public function siteInfoIndex()
    {
        return view('dashbord.pages.site_info')
            ->with('site_infos', SiteInfo::all());
    }

    public function siteInfoStore(Request $request)
    {
        $this->validate($request, [
            'mobile_one' => 'required',
            'address' => 'required',
            'mail_one' => 'required',
        ]);

        SiteInfo::create($request->all());

        Session::flash('success', 'Site info added successfully!');
        return back();
    }

    public function siteInfoUpdate(Request $request, $id)
    {
        $site_info = SiteInfo::findOrFail($id);

        $this->validate($request, [
            'mobile_one' => 'required',
            'address' => 'required',
            'mail_one' => 'required',
        ]);

        $site_info->update($request->all());

        Session::flash('success', 'Site info updated successfully!');
        return back();
    }

    public function siteInfoDestroy($id)
    {
        $site_info = SiteInfo::findOrFail($id);

        $site_info->delete();

        Session::flash('success', 'Site info deleted successfully!');
        return back();
    }

    public function siteDesciptionIndex()
    {
        return view('dashbord.pages.site_description')
            ->with('description', SiteDesciption::all());
    }

    public function siteDesciptionStore(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        SiteDesciption::create($request->all());
        Session::flash('success', 'Site description added successfully!');
        return back();
    }

    public function siteDesciptionUpdate(Request $request, $id)
    {
        $site_desciption = SiteDesciption::findOrFail($id);

        $this->validate($request, [
            'description' => 'required',
        ]);

        $site_desciption->update($request->all());
        Session::flash('success', 'Site description updated successfully!');
        return back();
    }
}
