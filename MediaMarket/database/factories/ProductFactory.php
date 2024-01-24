<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\DiscountOfProduct;
use App\Models\ProductCategory;
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
            'name' => fake()->lastName(),
            'description' => fake()->text(300),
            'price' => fake()->numberBetween(1000000, 10000000),
            'quantity' => fake()->randomNumber(),
            'status' => fake()->randomElement(['Còn', 'Hết hàng']),
            'discount_id' => DiscountOfProduct::all()->random()->id,
            'category_id' => ProductCategory::all()->random()->id,
            'brand_id' => Brand::all()->random()->id,
        ];
    }
}
