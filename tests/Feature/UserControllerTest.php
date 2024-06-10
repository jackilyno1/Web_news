<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

    /** @test */
    public function it_displays_create_user_form()
    {
        $response = $this->withoutMiddleware()->get('/users/add');

        $response->assertStatus(200);
        $response->assertViewIs('admin.pages.user.add')
                 ->assertViewHas('title', 'Create User');
    }

    /** @test */
    public function it_stores_a_new_user()
    {
        $response = $this->withoutMiddleware()->withoutExceptionHandling()->post('/users/add', [
            'name' => 'Linh',
            'email' => 'linh@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user', // or 'admin'
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('users', ['email' => 'linh@gmail.com']);
    }

    /** @test */
    public function it_displays_edit_user_form()
    {
        $user = User::factory()->create();

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->get("/users/edit/{$user->id}");

        $response->assertStatus(200)
                 ->assertViewIs('admin.pages.user.edit')
                 ->assertViewHas('title', 'Edit User');
    }

    /** @test */
    public function it_updates_an_existing_user()
    {
        
        $user = User::factory()->create([
            'name' => 'minh',
            'email' => 'minh@gmail.com',
            'password' => bcrypt('minh12345'),
            'role' => 'admin',
        ]);

        $data = [
            'name' => 'minh',
            'email' => 'minh@gmail.com',
            'password' => bcrypt('new_password'),
            'role' => 'admin',
        ];

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->post("/users/edit/{$user->id}", $data);

        $response->assertRedirect();

        
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'minh',
            'email' => 'minh@gmail.com',
            'password' => $user->password,
            'role' => 'admin',
        ]);
    }

    /** @test */
    public function it_deletes_an_existing_category()
    {
        $user = User::factory()->create();

        $response = $this->withoutMiddleware()->json('DELETE', '/users/destroy', ['id' => $user->id]);

        // Kiểm tra phản hồi JSON
        $response->assertJson([
            'error' => false,
            'message' => 'User deleted successfully'
        ]);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
