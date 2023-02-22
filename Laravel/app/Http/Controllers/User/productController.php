<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;


class productController extends Controller
{
    // -- Pages -- //
    public function index()
    {
        $products = Product::orderBy('price', 'DESC')->simplePaginate(6);
        return view('user.products.index')->with('products', $products);
    }


    public function search()
    {
        $query = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%' . $query . '%')->get();
        $scroll = true;
        dd($scroll);
        return view('user.products.index')->with('products', $products)->with('scroll', $scroll);
    }
}
