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
        return [
            'name' => fake()->domainWord(),
            'description' => fake()->text(250),
            'img' => fake()->word . '.jpg',
            'price' => fake()->numberBetween(10, 1000),
            'brand_id' => fake()->numberBetween(1, 20),
            'cat_id' => fake()->numberBetween(1, 10),
            'quantity' => fake()->numberBetween(0, 100),
            'status' => fake()->randomElement(['Active', 'Inactive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
