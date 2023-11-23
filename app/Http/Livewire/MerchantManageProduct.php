<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MerchantManageProduct extends Component
{
    public $product;
    public function mount($product){
        $this->product = $product;
    }
    public function render()
    {
        return view('pages.merchant.merchant-manage-product');
    }
}
