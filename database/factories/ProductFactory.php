<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('en_US'); // Set to English locale
        return [
            'name' => $this->faker->sentence(3, true), // Book title in English
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'image_path' => $this->faker->imageUrl(),
            'slug' => $this->faker->slug,
            'category_id' => \App\Models\Category::factory(),
            'author_id' => \App\Models\Author::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive', 'out_of_stock']),
        ];
    }
}
