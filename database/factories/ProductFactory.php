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
            'title' => fake()->randomElement(['Shirt', 'Pants', 'Hat', 'Shoes']),
            'price' => fake()->randomFloat(2,5,9999999999.99),
            'shortDescription' => fake()->text(),
            'image' => basename(fake()->image(public_path('assets\images\product'))),
        ];
    }
}
