<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadProfileBannerImage extends Component
{
    use WithFileUploads;

    public $merchant;
    public $bannerImage;
    public $temporaryBannerImageUrl;

    public function render()
    {
        if ($this->merchant->banner_image) {
            $this->bannerImage = $this->merchant->banner_image;
        }

        return view('livewire.upload-profile-banner-image');
    }

    public function updatedBannerImage()
    {
        $this->temporaryBannerImageUrl = $this->bannerImage->temporaryUrl();
    }
}
