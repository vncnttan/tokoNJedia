<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


/**
 * @extends Factory<Model>
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
            "id" => Str::uuid(),
            "promo_id" => Promo::all()->random()->id,
            "product_id" => Product::all()->random()->id,
            "discount" => random_int(25, 75),
        ];
    }
}
