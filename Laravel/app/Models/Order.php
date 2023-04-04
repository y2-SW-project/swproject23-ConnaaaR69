<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function hasProduct($id)
    {
        $products = $this->products->all();


        foreach ($products as $product) {
            if ($product->id == $id) {
                return true;
            } else false;
        }
    }

    public function convertFromCart($cartProducts)
    {
        foreach ($cartProducts as $cartProduct) {
            $this->attach($cartProduct);
        }
    }

    public function addProduct(Product $product)
    {
        $this->products()->attach($product->id);
    }

    public function removeProduct(Product $product)
    {
        $this->products()->detach($product->id);
    }

    public function total()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }
        return $total;
    }
}
