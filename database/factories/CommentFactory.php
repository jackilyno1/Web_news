<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory()->create()->id,
            'post_id' => \App\Models\Post::factory()->create()->id,
            'content' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
