<?php

namespace Database\Factories;

use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Bezhanov\Faker\Provider\Commerce;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
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
            'condition' => $this->faker->randomElement(['New', 'Used']),
            'merchant_id' => Merchant::all()->random()->id,
            'product_category_id' => ProductCategory::all()->random()->id
        ];
    }

    /**
     * Configure the factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            ProductImage::factory()->create([
                'product_id' => $product->id,
            ]);

            ProductVariant::factory()->create([
                'product_id' => $product->id,
            ]);
        });
    }
}
