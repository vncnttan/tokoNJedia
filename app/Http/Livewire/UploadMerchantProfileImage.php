<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadMerchantProfileImage extends Component
{
    use WithFileUploads;

    public $merchant;
    public $profileImage;
//    public $temporaryProfileImageUrl;

    public function render()
    {
//        if ($this->merchant->image) {
//            $this->profileImage = $this->merchant->image;
//        }
        return view('livewire.upload-merchant-profile-image');
    }

//    public function updatedProfileImage()
//    {
//        $this->temporaryProfileImageUrl = $this->profileImage->temporaryUrl();
//    }
}
