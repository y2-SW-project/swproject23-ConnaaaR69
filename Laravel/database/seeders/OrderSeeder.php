<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Database\Factories\OrderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Get all users
        $users = User::all();

        // Loop through each user
        foreach ($users as $user) {
            // Create 2-5 random products
            $products = Product::inRandomOrder()->take(rand(2, 5))->get();

            // Create an order with the products attached to it
            $order = Order::factory()->create(['user_id' => $user->id]);
            $order->products()->attach($products);
        }
    }
}
