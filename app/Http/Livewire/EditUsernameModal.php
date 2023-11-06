<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class EditUsernameModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.edit-username-modal');
    }
}
