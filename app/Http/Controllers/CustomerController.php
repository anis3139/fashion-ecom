<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\product;
use App\category;
use App\subCategory;
use App\thirdCategory;
use App\size;
use App\productAttr;
use App\order;
use App\seller_info;
use Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
        $this->middleware('SellerChecker');
    }

    function customerDashboard()
    {
        $ami = request()->r;
        $user_id = Auth::user()->id;
        $customerOrder = order::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return view('dashbord.customer.customerDashboard', compact('customerOrder', 'ami'));
    }


    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'

        ]);

        $hashPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashPassword)) {

            if (!Hash::check($request->password, $hashPassword)) {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back()->with('status', 'Old Password Not Match Places Try Again !');
            } else {
                return redirect()->back()->with('status', 'Old Password Not Match Places Try Again !');
            }
        } else {
            return redirect()->back()->with('status', 'Old Password Not Match Places Try Again !');
        }

    }

}
