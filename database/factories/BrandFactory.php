<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'description' => fake()->text(150),
            'logo' => fake()->word . '.jpg',
            'country' => fake()->country,
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
