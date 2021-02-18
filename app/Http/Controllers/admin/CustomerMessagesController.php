<?php

namespace App\Http\Controllers\admin;

use App\CustomerMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CustomerMessagesController extends Controller
{
    public function getCustomerMessage()
    {
        return view('dashbord.pages.customer_message')
            ->with('customer_messages', CustomerMessage::orderBy('id', 'desc')->get());
    }

    public function destroyCustomerMessage($id)
    {
        $message_delete = CustomerMessage::findOrFail($id);
        $message_delete->delete();
        Session::flash('success', 'Deleted successfully');
        return back();
    }
}
