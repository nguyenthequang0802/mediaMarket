<?php

namespace Database\Seeders;

use App\Models\CodeDiscount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CodeDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CodeDiscount::factory()->count(10)->create();
    }
}
