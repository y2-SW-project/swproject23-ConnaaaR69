<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class orderController extends Controller
{
    public function create()
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        $users = User::all()->except($u->id);
        return view('admin.orders.create')->with('users', $users);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'user_id' => 'required',
        ]);

        Order::create([
            'uuid' => Str::uuid(),
            'user_id' => $request->user_id,
        ]);

        return to_route('admin.index');
    }

    public function edit(Order $order)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');
        $users = User::all()->except($u->id);


        return view('admin.orders.edit')->with('order', $order)->with('users', $users);
    }

    public function update(Order $order, Request $req)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $req->validate([
            'user_id' => 'required'
        ]);

        $order->update([
            'user_id' => $req->user_id
        ]);
        return Redirect::back()->with('msg', 'Order Successfully Updated');
    }

    public function destroy(Order $order)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        $order->delete();
        return Redirect::back()->with('msg', 'Order Successfully Deleted');
    }
}
