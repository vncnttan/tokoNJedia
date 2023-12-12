<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(ProductCategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MerchantSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(ProductVariantSeeder::class);
        $this->call(PromoSeeder::class);
        $this->call(ShipmentSeeder::class);
        $this->call(ProductPromoSeeder::class);
        $this->call(FlashSaleProductSeeder::class);
    }
}
