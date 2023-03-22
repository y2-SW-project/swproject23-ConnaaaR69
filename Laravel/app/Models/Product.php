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

    public function order()
    {
        return $this->belongsToMany(Order::class, 'order');
    }

    // Returns project unique id
    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
