<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Example extends Controller
{
    public function hello(){
        // return "Hello sujna form abedin it i am from bangladesh";
        return view('home');
    }
}
