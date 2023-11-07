<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class InsertUsernameModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.insert-username-modal');
    }
}
