<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Shipment::create([
            'id' => Str::uuid(),
            'name' => 'Instant 3 Jam',
            'base_price' => 100000,
            'variable_price' => 500000,
        ]);

        Shipment::create([
            'id' => Str::uuid(),
            'name' => 'Same Day',
            'base_price' => 50000,
            'variable_price' => 100000,
        ]);

        Shipment::create([
            'id' => Str::uuid(),
            'name' => 'Next Day',
            'base_price' => 30000,
            'variable_price' => 50000,
        ]);

        Shipment::create([
            'id' => Str::uuid(),
            'name' => 'Regular',
            'base_price' => 10000,
            'variable_price' => 20000,
        ]);

        Shipment::create([
            'id' => Str::uuid(),
            'name' => 'Cargo',
            'base_price' => 5000,
            'variable_price' => 10000,
        ]);
    }
}
