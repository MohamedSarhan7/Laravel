<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'body' => fake()->slug(),
            'post_id' => Post::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
