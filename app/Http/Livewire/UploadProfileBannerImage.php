<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProfileBannerImage extends Component
{
    use WithFileUploads;

    public $merchant;
    public $bannerImage;
//    public $temporaryBannerImageUrl;

    public function render()
    {
        return view('livewire.upload-profile-banner-image');
    }


}
