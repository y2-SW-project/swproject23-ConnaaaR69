<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;


class ProductTest extends TestCase
{

    public function test_product_can_be_seeded()
    {
        $product =  Product::factory(User::class)->create();

        $this->assertDatabaseHas('products', ['title' => $product->title]);
    }

    public function test_product_can_be_updated()
    {
        $product =  Product::factory(User::class)->create();

        $oldTitle = $product->title;

        $product->title = 'test';

        $this->assertFalse($product->title == $oldTitle);
    }

    public function test_product_can_be_deleted()
    {
        $product =  Product::factory(User::class)->create();
        $product->delete();
        $this->assertDatabaseMissing('products', ['title' => $product->title]);
    }
}
