<?php

namespace Tests\Feature;

use App\Models\Categories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /** @test */
    public function it_displays_create_category_form()
    {
        $response = $this->withoutMiddleware()->get('/categories/add');

        $response->assertStatus(200);
        $response->assertViewIs('admin.pages.category.add');
                //  ->assertViewHas('title', 'Create Category');
    }

    /** @test */
    public function it_stores_a_new_category()
    {
        $response = $this->withoutMiddleware()->post('/categories/add', [
            'name' => 'New Category',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('categories', ['name' => 'New Category']);
        // $this->assertCount(1, Categories::all());
    }

    /** @test */
    public function it_displays_edit_category_form()
    {
        $category = Categories::factory()->create();

        $response = $this->withoutMiddleware()->withoutExceptionHandling()->get("/categories/edit/{$category->id}");

        $response->assertStatus(200)
                 ->assertViewIs('admin.pages.category.edit')
                 ->assertViewHas('title', 'Edit categories: ');
    }

    /** @test */
    public function it_updates_an_existing_category()
    {

    $category = Categories::factory()->create([
        'name' => 'Java',
    ]);

    $data = [
        'name' => 'Java',
    ];

    $response = $this->withoutMiddleware()->withoutExceptionHandling()->post("/categories/edit/{$category->id}", $data);

    $response->assertRedirect('/categories/list');

    $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'Java']);
    }

    /** @test */
    public function it_deletes_an_existing_category()
    {
        $category = Categories::factory()->create();

        $response = $this->withoutMiddleware()->json('DELETE', '/categories/destroy', ['id' => $category->id]);
    
        // Kiểm tra phản hồi JSON
        $response->assertJson([
            'error' => false,
            'message' => 'Deleted successfully category',
        ]);
    
        // Kiểm tra xem bài viết đã bị xóa khỏi database chưa
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
