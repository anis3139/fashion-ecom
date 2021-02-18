<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\logo;
use Carbon\Carbon;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('dashbord.pages.logo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   $lastinsertedid=logo::insertGetId([
    'image' => 'default.php',
     'created_at'=>Carbon::now()
     ]);

        
         if ($request->hasFile('image')) {
          $main_photo=$request->image;
          $imagename=$lastinsertedid.".".$main_photo->getClientOriginalExtension();
          
            // $ami =  app_path('store.gochange-tech.com/uploads/products_images/'.$imagename);
            //      dd($ami);
          Image::make($main_photo)->resize(400, 450)->save(base_path('public/upload/logo/'.$imagename));

          logo::find($lastinsertedid)->update([
          'image'=>$imagename
         ]);
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
