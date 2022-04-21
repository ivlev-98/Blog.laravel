<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->realText(rand(10, 40));
        $content = $this->faker->realText(rand(200, 1024));
        return [
            'title' => $title,
            'short_title' => Str::length($title) > 30 ? substr($title, 0, 30).'...' : $title,
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 10),
            'content' => $content,
            'short_content' => Str::length($content) > 300 ? substr($content, 0, 300).'...' : $content,
            'img' => $this->faker->image()
        ];
    }
}
