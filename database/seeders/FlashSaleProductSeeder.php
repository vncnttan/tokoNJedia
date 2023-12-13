<?php

namespace Database\Seeders;

use App\Models\FlashSaleProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlashSaleProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FlashSaleProduct::factory()->count(5)->create();
    }
}
