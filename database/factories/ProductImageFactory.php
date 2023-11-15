<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $response = Http::get('https://source.unsplash.com/random');

        return [
            'id' => Str::uuid(),
            'image' => $response->effectiveUri(),
            'product_id' => Product::all()->random()->id
        ];
    }
}
