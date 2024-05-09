<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    // use RefreshDatabase;
    // use WithFaker;

    /** @test */
    public function it_displays_create_post_form()
    {
        $response = $this->withoutMiddleware()->get('/posts/add');

        $response->assertStatus(200);
        $response->assertViewIs('pages.post.add');
                //  ->assertViewHas('title', 'Create post');
    }

    /** @test */
    public function it_stores_a_new_post()
    {
        $data = [
            'title' => 'Test Post',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'id_category' => 10,
            'img_url' => 'https://lorempixel.com/640/480/?76598'
        ];

        $response = $this->withoutMiddleware()->post('/posts/add', $data);

        $response->assertRedirect('/posts/list');
        $this->assertDatabaseHas('posts', ['title' => 'Test Post']);
    }

    /** @test */
    public function it_displays_edit_post_form()
    {
        $post = Post::factory()->create();

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->get("/posts/edit/{$post->id}");

        $response->assertStatus(200)
                 ->assertViewIs('pages.post.edit')
                 ->assertViewHas('title', 'Edit Post');
                //  ->assertViewHas('post', $post);
    }

    /** @test */
    public function it_updates_an_existing_post()
    {
        $post = Post::factory()->create();
        $data = [
            'title' => 'Modi quisquam sunt optio aut molestiae totam.',
            'description' => 'Quae voluptas neque illo officia soluta dignissimos sequi.',
            'content' => 'A corrupti velit numquam id eligendi recusandae. Aspernatur unde maiores ipsam amet vero. Facilis minus alias accusantium accusamus qui dignissimos qui placeat. Mollitia iste dolorem hic voluptate voluptate molestiae vel. Sit sed assumenda earum est alias cupiditate id sunt.',
            'id_category' => 8,
            'img_url' => 'https://lorempixel.com/640/480/?38243'
        ];

        $response = $this->withoutMiddleware()->post("/posts/edit/{$post->id}", $data);
        
        $response->assertRedirect('/posts/list');
        $this->assertDatabaseHas('posts', ['title' => 'Modi quisquam sunt optio aut molestiae totam.']);
    }

    /** @test */
    public function it_deletes_an_existing_post()
    {
    $post = Post::factory()->create();

    $response = $this->withoutMiddleware()->json('DELETE', '/posts/destroy', ['id' => $post->id]);

    // Kiểm tra phản hồi JSON
    $response->assertJson([
        'error' => false,
        'message' => 'Post deleted successfully',
    ]);

    // Kiểm tra xem bài viết đã bị xóa khỏi database chưa
    $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
