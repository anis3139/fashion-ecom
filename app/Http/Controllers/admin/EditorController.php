<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class EditorController extends Controller
{
    function indexEdit()
    {
        // return "df";
        return view('dashbord.editor');
    }

    function saveEditor(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'

        ]);
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);
        $newUser->roll_id = 6;
        $newUser->save();

        return back()->with('status', 'Editor Add Successfully');


    }

    function editorDelete($id)
    {
        User::find($id)->delete();
        return back()->with('status', 'Editor Delete Successfully !');
    }
}
