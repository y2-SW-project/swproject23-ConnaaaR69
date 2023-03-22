<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    // Returns project unique id
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
