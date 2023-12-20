<div class="relative h-96 overflow-hidden rounded-lg md:h-[50vh]">
    <input wire:model="bannerImage" name="bannerImage" type="file" accept="image/*" class="hidden">
    <img src="{{$this->bannerImage ?? asset('assets/logo/banner-merchant.jpeg')}}"
         class="absolute block w-full h-full object-cover"
         alt="Merchant Banner">
</div>
