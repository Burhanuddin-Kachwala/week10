<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique->name(),
            'slug' => Str::slug($this->faker->unique()->sentence, '-'),
            'bio' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
