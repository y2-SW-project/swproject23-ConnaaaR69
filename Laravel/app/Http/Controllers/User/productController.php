<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class productController extends Controller
{



    // -- Pages -- //
    public function index()
    {
        $user = Auth::user();
        // $cart = $user->cart()->with('cartProducts')->first();
        // $cartProducts = $cart->cartProducts;
        // dd($cartProducts);
        $products = Product::orderBy('price', 'DESC')->simplePaginate(6);
        return view('user.products.index')->with('products', $products)->with('user', $user);
    }

    public function show(Product $product)
    {
        $user = Auth::user();
        // dd($product);
        return view('user.products.show')->with('product', $product)->with('user', $user);
    }

    public function create()
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');
        return view('admin.products.create');
    }


    public function store(Request $request)
    {

        if (!$request->hasFile('image')) {
            // dd($request);
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


    public function edit(Product $product)
    {

        $u = Auth::user();
        $u->authorizeRoles('admin');


        return view('admin.products.edit')->with('product', $product);
    }

    public function update(Product $product, Request $req)
    {

        $user = Auth::user();
        $user->authorizeRoles('admin');

        if (!$req->hasFile('image')) {

            return to_route('user.products.create')->with('message', 'No Product Image Provided.');
        }

        $req->validate([
            'title' => 'required|max:50',
            'text' => 'required|max:250',
            'tags' => 'required|max:20',
            'image' => 'required'
        ]);

        $image = $req->file('image');
        $timestampFile = now()->timezone('Europe/Dublin')->format('Ymd_His') . $image->getClientOriginalName();
        $image->move('images', $timestampFile);

        $product->update([
            'title' => $req->title,
            'tags' => $req->tags,
            'text' => $req->text,
            'image' => $timestampFile,
            'price' => $req->price
        ]);

        return Redirect::back()->with('msg', 'Product Successfully Updated');
    }

    public function destroy(Product $product)
    {
        $u = Auth::user();
        $u->authorizeRoles('admin');
        // dd($product);
        $product->delete();
        return Redirect::back()->with('msg', 'Product Successfully Deleted');
    }

    public function search()
    {
        $query = $_GET['query'];
        $products = Product::where('title', 'LIKE', '%' . $query . '%');
        return view('user.products.index')->with('products', $products);
    }
}
