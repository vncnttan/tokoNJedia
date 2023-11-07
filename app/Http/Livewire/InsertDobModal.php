<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class InsertDobModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.insert-dob-modal');
    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
