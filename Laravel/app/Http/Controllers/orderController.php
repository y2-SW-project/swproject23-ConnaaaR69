<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
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
        $products = Product::all();
        // $u->authorizeRoles('admin');

        if ($u->id === $order->user_id) {
            if ($u->hasRole('admin')) {
                $u->authorizeRoles('admin');
                $users = User::all()->except($u->id);
                return view('admin.orders.edit')->with('order', $order)->with('users', $users)->with('products', $products);
            } else {
                return view('admin.orders.edit')->with('order', $order)->with('products', $products);
            }
        } else {
            return response('Unauthorized Access Error', 401);
        }
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


        $order->delete();
        return Redirect::back()->with('msg', 'Order Successfully Deleted');
    }
}
