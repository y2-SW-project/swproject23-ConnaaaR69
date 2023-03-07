<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function create()
    {
        $user = Auth::user();
        return view('admin.create');
    }

    public function store(Request $request)
    {

        if (!$request->hasFile('image')) {
            return to_route('admin.create')->with('message', 'No Product Image Provided.');
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
            'user_id' => Auth::id(),
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'tags' => $request->tags,
            'text' => $request->text,
            'image' => $timestampFile,
            'price' => $request->price
        ]);
    }
}
