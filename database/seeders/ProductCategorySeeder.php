<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Database\Factories\ProductCategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $categories = [
            'Shoes', 'Shirts', 'Pants', 'T-Shirt', 'Jeans', 'Hoodie', 'Jacket', 'Hat', 'Dress', 'Scarf',
            'Phone', 'Laptop', 'Smart Watch', 'TV', 'Monitor',
            'Books', 'Home Appliances', 'Toys', 'Kitchen', 'Living Room', 'Bed Room', 'Family Room'];
        foreach ($categories as $categoryName) {
            ProductCategory::factory()->create([
                'name' => $categoryName
            ]);
        }
    }
}
