<?php

namespace App\View\Components;

use App\Models\Merchant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MerchantCard extends Component
{
    private Merchant $merchant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($merchantId)
    {
        $this->merchant = Merchant::with(['location', 'products', 'products.ProductImages'])->where('id', $merchantId)->get()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.merchant.merchant-card', ['merchant' => $this->merchant]);
    }
}
