<?php

namespace Database\Seeders;

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Promo::factory()->state(
            [
                'promo_name' => "New Year's Sale",
                'promo_image' => "https://img.freepik.com/free-vector/realistic-year-end-sale-banner-template_52683-100314.jpg",
                'promo_description' => "New Year's Sale up to 70% off. Sale ends at 4th January.",
            ])->create();

        Promo::factory()->state(
            [
                'promo_name' => "Santa's Surprise",
                'promo_image' => "https://img.freepik.com/premium-vector/christmas-sale-vector-banner-design-christmas-promo-text-red-ribbon-space-with-xmas-elements_572288-2958.jpg",
                'promo_description' => "Christmas Sale up to 50% off. Sale ends at 31th December."
            ])->create();

        Promo::factory()->state(
            [
                'promo_name' => "Driver's Night",
                'promo_image' => "https://img.mensxp.com/media/content/2014/Oct/reasonswhyalatenightdriveismostawesomethingeverh_1412682663.jpg",
                'promo_description' => "Sale on driving products."
            ])->create();

        Promo::factory()->state(
            [
                'promo_name' => "Super Sale",
                'promo_image' => "https://img.freepik.com/free-vector/flat-sale-banner-with-photo_23-2149026968.jpg",
                'promo_description' => "Sale up to 75% off, limited time only."
            ])->create();

        Promo::factory()->state(
            [
                'promo_name' => "PB's Magical Blessing",
                'promo_image' => "https://firebasestorage.googleapis.com/v0/b/myhospital-2c105.appspot.com/o/made-this-anime-banner-in-pixlr-v0-eni9yujjzvxa1.jpg?alt=media&token=7e3b6eca-71e3-4c17-bb42-c845036f55ac",
                'promo_description' => "Up to 100% off."
            ])->create();

    }
}
