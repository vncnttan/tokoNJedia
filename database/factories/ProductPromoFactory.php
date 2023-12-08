<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductPromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "promo_id" => Promo::all()->random()->id,
            "product_id" => Product::all()->random()->id,
            "discount" => random_int(25, 75),
        ];
    }
}
