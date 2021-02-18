<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class AllCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $category = AllCategory ::all()->toArray();
        // return view('dashbord.pages.allcates' , compact('addcatagory'));

        $select = DB::select('select * from addcatagory');
    return view ('dashbord.pages.allcates')->with('allcates',$select);
    }
 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    
            // $select = DB::select('select * from addcatagory');
            // return view ('dashbord.fronts.incl.nav')->with('allcates',$select);
            // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        // $select = DB::table('addcatagory')
        //         ->where('category_id', $category_id)
        //         ->first();
       
        //  $select = view('dashbord.pages.editcategory')->with('allcates',$select);
        //  return view('dashbord.pages.editcategory', $select);

        $select = AllCategory::findOrFail($id);
        return view("dashbord.pages.editcategory", compact("cates"));
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
