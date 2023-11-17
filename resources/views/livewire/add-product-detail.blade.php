<div class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center p-10 gap-8">
    <h1 class="w-full text-2xl font-bold text-black">Product Detail</h1>
    <div class="w-full flex justify-between items-center gap-4">
        <div class="w-96 flex flex-col justify-start text-start items-center gap-2 flex-wrap">
            <h1 class="w-full text-lg text-gray-400">Product Image</h1>
            <p class="w-full">File Size: Maximum 10.000.000 bytes (10 Megabytes). File
                extension
                allowed: .JPG, .JPEG, .PNG</p>
        </div>
        @livewire('upload-product-image', ['slot' => 5])
    </div>
    <div class="w-full flex justify-between items-center gap-4">
        <div class="w-96 h-full flex flex-wrap flex-col justify-start text-start items-center gap-2">
            <h1 class="w-full text-lg text-gray-400">Condition</h1>
        </div>
        <div class="w-full flex gap-10">
            <label class="radio-label flex items-center gap-2 text-lg" for="">
                <input class="w-6 h-6 checked:text-green-500  text-green-500" name="condition" value="New"
                    type="radio">
                New
            </label>
            <label class="radio-label flex items-center gap-2 text-lg" for="">
                <input class="w-6 h-6 bg-green-500 checked:bg-green-500 text-green-500" name="condition" value="Used"
                    type="radio">
                Used
            </label>
        </div>
    </div>
    <div class="w-full flex justify-between items-center gap-4 ">
        <div class="w-96 h-full flex flex-wrap flex-col justify-start text-start items-center gap-2">
            <h1 class="w-full text-lg text-gray-400">Product Description</h1>
            <p class="max-w-full flex-wrap">Make sure the product description contains a detailed explantation regarding
                your product so that buyers can easily understand and find your product </p>
        </div>
        <div class="w-full">
            <textarea class="input-style overflow-hidden w-full resize-none" name="description" id="description" cols="8"
                rows="8"></textarea>
        </div>
    </div>
</div>
