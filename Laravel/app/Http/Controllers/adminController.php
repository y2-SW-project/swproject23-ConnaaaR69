<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class adminController extends Controller
{
    // -- Pages -- //
    public function index()
    {
        $products = Product::orderBy('updated_at', 'DESC')->get();
        $orders = Order::orderBy('created_at', 'DESC')->get();
        // dd($orders);
        return view('admin.index')->with('products', $products)->with('orders', $orders);
    }
}
