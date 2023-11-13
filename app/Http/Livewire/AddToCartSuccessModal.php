<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class AddToCartSuccessModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.add-to-cart-success-modal');
    }

    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
