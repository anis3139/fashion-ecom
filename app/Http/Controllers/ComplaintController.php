<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\complain;
use Carbon\Carbon;
class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
      return view('fronts.complaint');
     

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
        // return $request->all();
        // $complain = new complain();
        // $complain->code= $request->code;
        // $complain->name =  $request->name;
        // $complain->phone_nu =  $request->phone_nu;
        // $complain->complaint = $request->complaint;
        // $complain->save();

     $complain_id = complain::insertGetId([
            'code' =>$request->code,
            'name' =>$request->name,
            'phone_nu' =>$request->phone_nu,
            'complaint' =>$request->complaint,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Data inserted Successfully');
        // $code = $request->code;
        // $name = $request->name;
        // $phone_nu = $request->phone_nu;
        // $complaint = $request->complaint;

     
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
