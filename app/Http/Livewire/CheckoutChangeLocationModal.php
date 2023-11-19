<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CheckoutChangeLocationModal extends ModalComponent
{
    public $selected_location_id;

    public function mount($selected_location_id)
    {
        $this->selected_location_id = $selected_location_id;
    }

    public function selectLocation($location_id)
    {
        $this->selected_location_id = $location_id;
        $this->emit('locationSelected', Location::find($location_id));
        $this->closeModal();
    }

    public function render()
    {
        $user = User::with('Location')->find(auth()->user()->id);
        return view('livewire.checkout-change-location-modal', ['user' => $user, 'selected_location_id' => $this->selected_location_id]);
    }
}
