<?php

namespace App\View\Components;

use Bezhanov\Faker\ProviderCollectionHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        $faker = \Faker\Factory::create();
        ProviderCollectionHelper::addAllProvidersTo($faker);

        $productNames = [];
        for ($i = 0; $i < 5; $i++) {
            $productNames = [...$productNames,  $faker->productName()];
        }
        $merchant = null;
        if(Auth::check()){
            $merchant = Auth::user()->Merchant;
        }

        return view('components.navbar', ['product_names' => $productNames, 'merchant' => $merchant]);
    }
}
