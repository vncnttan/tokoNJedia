<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class AddProductVariant extends ModalComponent
{
    public $variants = [];
    public $slot;
    public function mount($slot = 1)
    {
        $this->slot = $slot;
        $this->variants = array_fill(0, $slot, null);
    }
    public function add(){
        $this->variants[] = null;
    }
    public function render()
    {
        return view('livewire.add-product-variant');
    }
}
