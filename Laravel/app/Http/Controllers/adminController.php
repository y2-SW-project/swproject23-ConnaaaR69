<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    // -- Pages -- //
    public function index()
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');



        $cart = $u->cart()->with('cartProducts')->first();
        $cartProducts = $cart->cartProducts;
        foreach ($cartProducts as $cartProduct) {
            $product = $cartProduct->product;
            // echo $product->title;
        }

        $products = Product::orderBy('updated_at', 'DESC')->get();
        $orders = Order::orderBy('created_at', 'DESC')->get();
        // dd($orders);
        return view('admin.index')->with('products', $products)->with('orders', $orders)->with('user', $u);
    }
}
