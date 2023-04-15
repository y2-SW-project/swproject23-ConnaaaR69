<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;


class UserTest extends TestCase
{


    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'Connor Mattless'
        ]);
    }

    public function test_user_has_cart()
    {

        $user =  User::factory(User::class)->create();
        $cart = Cart::factory(Cart::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $cart->user);
    }

    public function test_user_can_be_seeded()
    {

        $user =  User::factory(User::class)->create();
        $cart = Cart::factory(Cart::class)->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('users', ['name' => $user->name]);
    }

    public function test_user_cart_has_products()
    {

        User::factory()->times(1)->create()->each(function ($user) {
            $cart = Cart::factory()->create(['user_id' => $user->id]);
            Product::inRandomOrder()->take(rand(1, 5))->get();
            $this->assertModelExists($cart);
        });
    }
}
