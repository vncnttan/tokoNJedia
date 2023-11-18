<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductVariantDropdown extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        $variants = $this->product->ProductVariants;
        return view('livewire.product-variant-dropdown', ['variants' => $variants]);
    }
}
