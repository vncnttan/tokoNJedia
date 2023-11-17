<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddLocationModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.add-location-modal');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
    }
}
