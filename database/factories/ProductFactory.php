<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductCategory;
use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
//        dd(ProductCategory::all()->random()->id);

        $faker = \Faker\Factory::create();
        $faker->addProvider(new Commerce($faker));

        return [
            'id' => Str::uuid(),
            'name' => $faker->productName,
            'description' => $this->faker->realText,
            'stock' => $this->faker->numberBetween(0, 20),
            'merchant_id' => Merchant::all()->random()->id,
            'product_category_id' => ProductCategory::all()->random()->id
        ];
    }
}
