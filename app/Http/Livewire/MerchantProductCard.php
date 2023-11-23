<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MerchantProductCard extends Component
{
    public $product;
    public function mount($product){
        $this->product = $product;
    }
    public function render()
    {
        return view('components.merchant.merchant-product-card');
    }
}
