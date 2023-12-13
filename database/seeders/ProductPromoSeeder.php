<?php

namespace Database\Seeders;


use App\Models\ProductPromo;
use Illuminate\Database\Seeder;

class ProductPromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ProductPromo::factory()->count(20)->create();
    }
}
