<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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


    public function definition()
    {
//        dd(ProductCategory::all()->random()->id);

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        return [
            'id' => Str::uuid(),
            'name' => $faker->productName,
            'price' => $this->faker->numberBetween(1000, 100000),
            'description' => $this->faker->realText,
            'image' => 'https://source.unsplash.com/random',
            'stock' => $this->faker->numberBetween(0, 20),
            'merchant_id' => Merchant::all()->random()->id,
            'product_category_id' => ProductCategory::all()->random()->id
        ];
    }
}
