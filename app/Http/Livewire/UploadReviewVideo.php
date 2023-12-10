<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadReviewVideo extends Component
{
    use WithFileUploads;

    public $videos = [];
    public $slot;
    public function mount($slot = 5)
    {
        $this->slot = $slot;
        $this->videos = array_fill(0, $slot, null);
    }
    public function remove($index){
        $this->videos[$index] = null;
    }
    public function render()
    {
        return view('livewire.upload-review-video');
    }
}
