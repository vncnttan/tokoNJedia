<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Merchant;
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
    public function render(): View|Factory|Application
    {
        $faker = \Faker\Factory::create();
        ProviderCollectionHelper::addAllProvidersTo($faker);

        $productNames = [];
        for ($i = 0; $i < 5; $i++) {
            $productNames = [...$productNames,  $faker->productName()];
        }
        $merchant = null;
        if(Auth::check()){
            $merchantId = Auth::user()->id;
            $merchant = Merchant::where('user_id', $merchantId)->first();
        }

        $merchantRouteList = ['merchant', 'merchant/chat', 'merchant/add-product', 'merchant/manage-product', 'merchant/transactions', 'merchant/profile'];

        if (Auth::check() && in_array(request()->path(), $merchantRouteList)) {
            $merchantPage = true;
        } else {
            $merchantPage = false;
        }

        $cartCount = Auth::user() ? Cart::where('user_id', Auth::user()->id)->count(): 0;

        return view('components.navbar', ['product_names' => $productNames, 'merchant' => $merchant, 'merchantPage' => $merchantPage, 'cartCount' => $cartCount]);
    }
}
