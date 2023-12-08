<?php

namespace App\View\Components;

use App\Models\Merchant;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MerchantFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($merchantId)
    {
        $this->merchant = Merchant::find($merchantId);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.merchant-footer', ['merchant' => $this->merchant]);
    }
}
