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
    public function add(Request $request)
    {


        $user = Auth::user();
        $cart = $user->cart;
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


        $cartProduct = CartProduct::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
        ]);


        if (!$cartProduct) {
            return response()->json(['error' => 'Unable to add product to cart'], 500);
        }

        return response()->json(['success' => 'Product added to cart', 'cartProduct' => $cartProduct]);
    }

    public function count()
    {
        $user = Auth::user();
        $cart = $user->cart;
        if (!$cart) {
            return response()->json(['count' => 0]);
        }

        $count = $cart->products->count();
        return response()->json(['count' => $count]);
    }
}
