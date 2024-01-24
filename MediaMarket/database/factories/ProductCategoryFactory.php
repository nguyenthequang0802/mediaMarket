<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $num_category = ProductCategory::count();
        $random_number = fake()->randomNumber(1);
        if($num_category > 0 && $random_number < 3){
            return [
                'parent_id' => ProductCategory::all()->random()->id,
                'name'=> fake()->lastName(),
                'description' => fake()->text(300),
            ];
        } else {
            return [
                'parent_id' => 0,
                'name'=> fake()->lastName(),
                'description' => fake()->text(300),
            ];
        }
    }
}
