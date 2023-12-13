<?php

namespace Database\Factories;

use App\Models\FlashSaleProduct;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<FlashSaleProduct>
 */
class FlashSaleProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::all()->random()->id,
            'start_date' => Carbon::yesterday()->setTime(22, 0),
            'end_date' => Carbon::now()->addWeek()->setTime(22, 0),
            'discount' => $this->faker->numberBetween(50, 100),
        ];
    }
}
