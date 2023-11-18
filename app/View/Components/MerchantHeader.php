<?php

namespace App\View\Components;

use App\Models\Merchant;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\View\Component;

class MerchantHeader extends Component
{
    private Merchant $merchant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($merchantId)
    {
//        dd($merchantId);
        $this->merchant = Merchant::where('id', $merchantId)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        Log::info('MerchantHeader component is being rendered');
        return view('components.merchant.merchant-header', ['merchant' => $this->merchant]);
    }
}
