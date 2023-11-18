<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProductImage extends Component
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
        // $this->rearrangeImages();
    }

    // public function rearrangeImages()
    // {

    //     $tempImages = $this->images;
    //     $this->images[] = [];
    //     $tempImages  = array_values(array_filter($tempImages, function ($image) {
    //         return !is_null($image);
    //     }));

    //     while(count($tempImages) < $this->slot) {
    //         $tempImages[] = null;
    //     }
    //     $this->images = $tempImages;
    // }
    public function remove($index){
        $this->images[$index] = null;
        // $this->rearrangeImages();
    }
    public function render()
    {
        return view('livewire.upload-product-image');
    }
}
