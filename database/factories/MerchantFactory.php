<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Merchant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name,
            'location_id' => Location::all()->random()->id,
            'image' => 'https://source.unsplash.com/random',
            'user_id' => User::all()->random()->id
        ];
    }
}
