<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginUserControllerTest extends TestCase
{
    public function setUp(): void{
        parent::setUp();
        // Xóa dữ liệu trong bảng người dùng
        User::query()->delete();
    }

    /** @test */
    public function user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'minhhap203@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $response = $this->post('/user/login', [
            'email' => 'minhhap203@gmail.com',
            'password' => '123456789',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/user/login', [
            'email' => 'test@gmail.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertRedirect();
        $this->assertGuest();
    }

    /** @test */
    public function user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Linh',
            'email' => 'linh@gmail.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }

    /** @test */
    public function user_can_logout()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->post('/user/logout');

        $response->assertRedirect('/home');
        $this->assertGuest();
    }

    
}
