<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productController extends Controller
{
    // -- Pages -- //
    public function index()
    {
        $products = Product::orderBy('price', 'DESC')->simplePaginate(6);
        return view('user.products.index')->with('products', $products);
    }
}
