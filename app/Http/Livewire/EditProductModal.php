<?php

namespace App\Http\Livewire;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class EditProductModal extends ModalComponent
{
    public $product;
    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.edit-product-modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
