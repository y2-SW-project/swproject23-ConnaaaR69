<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class productController extends Controller
{



    // -- Pages -- //
    public function index()
    {
        $products = Product::orderBy('price', 'DESC')->simplePaginate(6);
        return view('user.products.index')->with('products', $products);
    }

    public function create()
    {
        Auth::user();
        return view('admin.products.create');
    }


    public function store(Request $request)
    {

        if (!$request->hasFile('image')) {
            dd($request);
            return to_route('user.products.create')->with('message', 'No Product Image Provided.');
        }
        $request->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:250',
            'tags' => 'required|max:20',
            'image' => 'required'
        ]);

        $image = $request->file('image');
        $timestampFile = now()->timezone('Europe/Dublin')->format('Ymd_His') . $image->getClientOriginalName();
        $image->move('images', $timestampFile);

        Product::create([
            // 'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'tags' => $request->tags,
            'text' => $request->text,
            'image' => $timestampFile,
            'price' => $request->price
        ]);

        return to_route('admin.index');
    }

    public function search()
    {
        $query = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%' . $query . '%');

        // dd($scroll);
        return view('user.products.index')->with('products', $products);
    }
}
