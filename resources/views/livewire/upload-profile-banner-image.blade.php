<div class="relative h-96 overflow-hidden rounded-lg md:h-[50vh] group">
    <label class="relative group">
        <input id="bannerImageUpload"
               wire:model="bannerImage" name="bannerImage" type="file" accept="image/*" class="hidden">
        <button
            type="button"
            id="uploadButton" onclick="document.getElementById('bannerImageUpload').click()" class="group-hover:flex hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white p-2 w-full h-full !bg-black !bg-opacity-25 justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
        </button>
        <img src="{{ $bannerImage ? $bannerImage->temporaryUrl() : $merchant->bannerImage ?? asset('assets/logo/banner-merchant.jpeg') }}"
             class="block w-full h-full object-cover"
             alt="Merchant Banner">
    </label>
</div>
