<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CartSeeder::class);
         $this->call(ProductCategorySeeder::class);
         $this->call(UserSeeder::class);
//         $this->call(LocationSeeder::class);
         $this->call(MerchantSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(ProductImageSeeder::class);
         $this->call(ProductVariantSeeder::class);
         $this->call(PromoSeeder::class);
         $this->call(ShipmentSeeder::class);
    }
}
