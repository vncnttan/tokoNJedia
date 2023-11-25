<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Loading extends ModalComponent
{
    public function render()
    {
        return view('livewire.loading');
    }
}
