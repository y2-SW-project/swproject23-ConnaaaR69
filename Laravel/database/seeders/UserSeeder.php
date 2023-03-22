<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\CartProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create user with admin role
        $role_admin = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Connor Mattless';
        $admin->email = 'cm@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        // Create generic users
        User::factory()->times(10)->hasOrders(2)->create()->each(function ($user) {
            $cart = Cart::factory()->create(['user_id' => $user->id]);
            $products = Product::inRandomOrder()->take(rand(1, 5))->get();

            foreach ($products as $product) {
                $cartProduct = new CartProduct();
                $cartProduct->cart_id = $cart->id;
                $cartProduct->product_id = $product->id;
                $cartProduct->save();
            }
        });
    }
}
