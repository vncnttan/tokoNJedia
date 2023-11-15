<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProductImageComponent extends Component
{
    use WithFileUploads;

    public $images = [];
    public $slot;
    public function mount($slot = 5)
    {
        $this->slot = $slot;
        $this->images = array_fill(0, $slot, null);
    }
    public function updatedImages($value, $key)
    {
        $this->rearrangeImages();
    }

    public function rearrangeImages()
    {
        $this->images = array_values(array_filter($this->images, function ($image) {
            return !is_null($image);
        }));

        while(count($this->images) < $this->slot) {
            $this->images[] = null;
        }
    }
    public function render()
    {
        return view('livewire.upload-product-image-component');
    }
}
