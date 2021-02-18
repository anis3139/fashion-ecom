<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{
    public function index(){
        return view('dashbord.pages.profile');
    }

    public function addcate(){
        return view('dashbord.pages.addCates');
    }

    
}
