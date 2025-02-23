<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseOrder>
 */
class PurchaseOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'supplier_id' => function (array $attributes) {
                return Product::find($attributes['product_id'])->supplier_id;
            },
            'quantity' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->randomElement(['pending', 'ordered', 'received']),
        ];
    }
}
