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
        $response->assertViewIs('pages.user.add')
                 ->assertViewHas('title', 'Create User');
    }

    /** @test */
    public function it_stores_a_new_user()
    {
        $response = $this->withoutMiddleware()->post('/users/add', [
            'name' => 'New Category',
            'email' => 'fdsadsfa@gmail.com',
            'password' => bcrypt('kakakakaka')
        ]);

        $response->assertRedirect();
    }

    /** @test */
    public function it_displays_edit_user_form()
    {
        $user = User::factory()->create();

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->get("/users/edit/{$user->id}");

        $response->assertStatus(200)
                 ->assertViewIs('pages.user.edit')
                 ->assertViewHas('title', 'Edit User');
    }

    /** @test */
    public function it_updates_an_existing_user()
    {
        $users = User::factory()->create();

        $data = [
            'name' => 'Tiến Minh',
            'email' => 'fdsadsfa@gmail.com',
            'password' => bcrypt('kakakakaka')
        ];

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->post("/users/edit/{$users->id}", $data);

        $response->assertRedirect();
        // $this->assertEquals('Updated Category', Categories::first()->name);
    }

    /** @test */
    public function it_deletes_an_existing_category()
    {
        $user = User::create([
            'name' => 'Tiến Minh',
            'email' => 'fdsadsfa@gmail.com',
            'password' => bcrypt('kakakakaka'),
            // Đảm bảo rằng bạn đã thêm tất cả các trường cần thiết
        ]);
    
        $response = $this->withoutMiddleware()->json('DELETE', '/users/destroy', ['id' => $user->id]);
    
        $response->assertJson([
            'error' => false,
            'message' => 'User deleted successfully' // Cập nhật thông điệp này cho phù hợp
        ]);
    }
}
