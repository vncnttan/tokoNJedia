<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Yoeunes\Toastr\Facades\Toastr;

class AddProductVariant extends ModalComponent
{
    public $variants = [];
    public $slot;
    public function mount($slot = 1)
    {
        $this->slot = $slot;
        $this->variants = array_fill(0, $slot, null);
    }

    public function addVariant()
    {
        if (count($this->variants) < 5) {
            $this->slot = $this->slot + 1;
            $this->variants[] = null;
        } else {
            toastr()->error("Product variant has reach its maximum slot", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }
    }

    public function deleteVariant(){
        $this->slot = 0;
        $this->variants = [];
    }

    public function removeVariant($index){
        if(count($this->variants) > 2){
            unset($this->variants[$index]);
            $this->variants = array_values($this->variants);
            $this->slot = count($this->variants);
        }
        else{
            toastr()->error("Product variant must be at least 2", '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        }
    }

    public function save(){
        foreach($this->variants as $variant){

        }
    }

    public function render()
    {
        return view('livewire.add-product-variant');
    }
}
