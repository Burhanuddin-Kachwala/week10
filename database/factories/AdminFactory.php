<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'Stuart',
            'last_name' => 'Little',
            'email' => 'admin4@admin.com',
            'password' => Hash::make('admin@123'), // or use Hash::make('admin@123')
            'role_id' => \App\Models\Role::factory(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
