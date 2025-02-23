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
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'quantity' => $this->faker->numberBetween(0, 100),
            'minimum_stock' => $this->faker->numberBetween(10, 30),
            'price' => $this->faker->randomFloat(2, 10, 1000),
        ];
    }
}
