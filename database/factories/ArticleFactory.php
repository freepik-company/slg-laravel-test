<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = \App\Models\Article::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->words(5, true)),
            'body' => $this->faker->paragraph,
            'slug' => Str::slug($this->faker->sentence),
            'active' => $this->faker->boolean,
            'published_at' => $this->faker->optional()->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}
