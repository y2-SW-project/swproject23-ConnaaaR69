<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartProduct;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        $products = $cart->cartProducts;


        return view('cart.index')->with('cart', $products);
    }

    public function add(Request $request)
    {


        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        // dd($user->cart);
        //this shouldn't be needed as every user has a cart, but just incase...
        if (!$cart) {
            $cart = Cart::create([
                'user_id' => $user->id,
            ]);
        }

        //get product from product id
        $product = Product::find($request->input('product_id'));
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cartProduct = CartProduct::where('product_id', '=',  $product->id)->where('cart_id', '=', $user->cart->id)->get()->first();

        if (CartProduct::where('product_id', '=', $product->id)->where('cart_id', '=', $user->cart->id)->exists()) {

            $cartProduct->quantity =  $cartProduct->quantity + 1;
            $cartProduct->save();
            return response()->json(['success' => 'Product added to cart', 'cartProduct' => $cartProduct]);
        } else {

            $cartProduct = CartProduct::create([
                'cart_id' => $user->cart->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
            return response()->json(['success' => 'Product added to cart', 'cartProduct' => $cartProduct]);
        };

        return response()->json(['error' => 'Unable to add product to cart'], 500);



        // dd($cartProduct);
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        //this shouldn't be needed as every user has a cart, but just incase...
        if (!$cart) {
            return response()->json(['error' => 'No cart exists'], 500);
        }

        //get product from product id
        $product = Product::find($request->input('product_id'));
        dd($request->input('product_id'));
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $cartProduct = CartProduct::where('product_id', '=',  $product->id)->where('cart_id', '=', $user->cart->id)->get()->first();

        if (CartProduct::where('product_id', '=', $product->id)->where('cart_id', '=', $user->cart->id)->exists()) {

            $cartProduct->quantity =  $cartProduct->quantity + 1;
            $cartProduct->delete();
            return response()->json(['success' => 'Product removed from cart', 'cartProduct' => $cartProduct]);
        }
        return response()->json(['error' => 'Product Not Found!']);
    }
}
