<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;


class AuthenticationTest extends TestCase
{

    use WithFaker;
    public function test_new_user_can_create_account()
    {


        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => $this->faker->safeEmail(),
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_new_user_cannot_create_account_with_non_matching_passwords()
    {

        $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testemail@test.com',
            'password' => 'password',
            'password_confirmation' => 'passwordMismatch'
        ]);

        $this->assertGuest();
    }

    public function test_users_can_login()
    {
        $u = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $u->email,
            'password' => 'password'
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_incorrect_input_can_not_login()
    {
        $u = User::factory()->create();

        $this->post('/login', [
            'email' => $u->email,
            'password' => 'badpassword'
        ]);

        $this->assertGuest();
    }
}
