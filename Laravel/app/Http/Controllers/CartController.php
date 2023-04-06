<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartProduct;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        $products = $cart->cartProducts;


        return view('cart.index')->with('cart', $products);
    }

    public function show()
    {
        //idk, my js needs this
        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        $products = $cart->cartProducts;


        return view('cart.index')->with('cart', $products);
    }

    public function convertToOrder()
    {
        $user = Auth::user();
        $cart = $user->cart->with('cartProducts')->first();
        $cartProducts = $cart->cartProducts;

        $order = Order::create([
            'user_id' => $user->id,
            'uuid' => Str::uuid(),
            'created_at' => now()

        ]);

        // $order->convertFromCart($cartProducts);
        // $cart->emptyCart($cartProducts);
        if (empty($cartProducts)) {
            return Redirect::back()->with('msg', 'Nothing to order');
        } else {
            foreach ($cartProducts as $cartProduct) {
                $order->products()->attach($cartProduct->product, ['quantity' => $cartProduct->quantity]);
                $cartProduct->delete();
            }
            return Redirect::back()->with('msg', 'Order successfully placed!');
        }




        // foreach ($cartProducts as $cartProduct) {
        //     $order->attach($cartProduct->product->id);

        // }

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

            if (Auth::check()) {
                $countObj = 0;
                $allProds = $cart->cartProducts;
                $total = 0;
                foreach ($allProds as $cartProduct) {
                    $countObj += $cartProduct->quantity;
                    $total += $cartProduct->product->price * $cartProduct->quantity;
                }
                // dd($cartProducts);
            }

            return response()->json(['success' => 'Product added to cart', 'cartProduct' => $cartProduct, 'countObj' => $countObj]);
        };

        return response()->json(['error' => 'Unable to add product to cart'], 500);



        // dd($cartProduct);
    }

    public function remove(Request $request)
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
        $product = $request->input('product_id');

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        $cartProduct = CartProduct::where('id', '=',  $product)->where('cart_id', '=', $user->cart->id)->get()->first();

        if ($cartProduct->exists()) {
            if ($cartProduct->quantity > 1) {
                $cartProduct->quantity =  $cartProduct->quantity - 1;
                $cartProduct->save();
                return response()->json(['success' => 'product removed from cart', 'cartProduct' => $cartProduct]);
            } else {
                $cartProduct->delete();
                return response()->json(['success' => 'Product removed from cart']);
            }
        }
        return response()->json(['error' => 'Product Not Found!']);
    }
}
