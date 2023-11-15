<?php

namespace Database\Factories;

use App\Models\Promo;
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
        $response = Http::get('https://source.unsplash.com/random');
        return [
            'promo_name' => Str::uuid(),
            'promo_image' => $response->effectiveUri(),
            'promo_description' => $this->faker->text,
        ];
    }
}
