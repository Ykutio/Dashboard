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
            'name' => fake()->domainWord(),
            'description' => fake()->text(150),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
