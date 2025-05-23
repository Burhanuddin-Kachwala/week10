<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Fiction', 'Non-Fiction', 'Self-Help', 'Biography', 'Science Fiction', 'Fantasy', 'Mystery', 'Thriller', 'Romance', 'Horror']),
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
