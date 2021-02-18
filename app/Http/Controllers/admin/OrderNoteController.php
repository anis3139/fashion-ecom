<?php

namespace App\Http\Controllers\admin;

use App\order;
use App\OrderNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrderNoteController extends Controller
{
    public function index($id)
    {
        return view('dashbord.order_note')
            ->with('order_notes', OrderNote::where('order_id', $id)->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'note' => 'required|min:3',
        ]);

        OrderNote::create($request->all());
        Session::flash('success', 'Note added successfully');
        return back();
    }

    public function destroy($id)
    {
        $order_note = OrderNote::findOrFail($id);
        $order_note->delete();
        Session::flash('success', 'Note deleted successfully');
        return back();
    }
}
