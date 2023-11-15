<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/**
 * @extends Factory<Merchant>
 */
class MerchantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $response = Http::get('https://source.unsplash.com/random');
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name,
            'image' => $response->effectiveUri(),
            'user_id' => User::all()->random()->id,
            'phone' => $this->faker->phoneNumber,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Merchant $merchant) {
            Location::factory()->create([
                'locationable_type' => 'App\\Models\\Merchant',
                'locationable_id' => $merchant->id,
            ]);
        });
    }
}
