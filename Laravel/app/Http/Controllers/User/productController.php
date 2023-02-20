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
        $products = Product::latest('updated_at')->simplePaginate(12);
        return view('user.products.index')->with('products', $products);
    }
}
