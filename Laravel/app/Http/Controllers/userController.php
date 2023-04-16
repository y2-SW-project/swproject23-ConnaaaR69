<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class userController extends Controller
{
    public function profile(User $user)
    {
        $user = Auth::user();
        $orders = count(Order::where('user_id', '=', $user->id)->get());

        return view('user.user-profile')->with('user', $user)->with('orders', $orders);
    }

    public function orders(User $user)
    {
        $user = Auth::user();
        $orders = Order::where('user_id', '=', $user->id)->orderBy('created_at', 'DESC')->with('products')->get();

        return view('user.user-orders')->with('orders', $orders);
    }

    public function destroy(User $user)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');

        $user->delete();
        return Redirect::back()->with('msg', 'Order Successfully Deleted');
    }
}
