<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\Promo;
use App\Models\PromoProduct;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * @extends Factory<Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'promo_name' => $this->faker->word,
            'promo_image' => $this->faker->imageUrl,
            'promo_description' => $this->faker->sentence,
        ];
    }


    /**
     * Configure the factory.
     *
     * @return $this
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Promo $promo) {
            for ($i = 0; $i < 5; $i++) {
                PromoProduct::create([
                    'promo_id' => $promo->id,
                    'product_id' => Product::all()->random()->id,
                ]);
            }
        });
    }
}
