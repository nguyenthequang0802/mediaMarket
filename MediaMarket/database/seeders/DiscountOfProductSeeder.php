<?php

namespace Database\Seeders;

use App\Models\DiscountOfProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountOfProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiscountOfProduct::factory()->count(10)->create();
    }
}
