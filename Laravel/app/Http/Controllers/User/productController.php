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
        return view('user.products.index');
    }
}
