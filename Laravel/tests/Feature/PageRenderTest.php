<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageRenderTest extends TestCase
{
    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_can_index_render()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_store_render()
    {
        $response = $this->get('/store');

        $response->assertStatus(200);
    }

    public function test_can_contact_render()
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }
}
