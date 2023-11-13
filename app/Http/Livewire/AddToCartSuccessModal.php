<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductVariant;
use LivewireUI\Modal\ModalComponent;

class AddToCartSuccessModal extends ModalComponent
{
    public $variantId;
    public $quantity;
    public $productId;

    public function mount($product_id = null, $variant_id = null, $quantity = null)
    {
        $this->productId = $product_id;
        $this->variantId = $variant_id;
        $this->quantity = $quantity;
    }
    public function render()
    {

        return view('livewire.add-to-cart-success-modal', [
            'product' => Product::find($this->productId),
            'variant' => ProductVariant::find($this->variantId),
            'quantity' => $this->quantity,
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '7xl';
    }
}
