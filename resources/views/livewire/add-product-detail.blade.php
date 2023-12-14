<div class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center p-6 sm:p-10 gap-8">
    <h1 class="w-full text-2xl font-bold text-black">Product Detail</h1>
    <div class="w-full flex justify-between items-center gap-4 flex-col md:flex-row">
        <div class="md:w-96 w-full flex flex-col justify-start text-start items-center gap-1 flex-wrap">
            <h1 class="w-full text-lg text-gray-400 font-semibold">Product Image
                <span class="text-red-600"> * </span>
            </h1>
            <p class="w-full">File Size: Maximum 10.000.000 bytes (10 Megabytes). File
                extension
                allowed: .JPG, .JPEG, .PNG</p>
        </div>
        @livewire('upload-product-image', ['slot' => 5])
    </div>
    <div class="w-full flex justify-between items-center gap-4">
        <div class="w-full h-full flex flex-wrap flex-col justify-start text-start items-center gap-1">
            <h1 class="w-full text-lg text-gray-400 font-semibold">Condition
                <span class="text-red-600"> * </span>
            </h1>
        </div>
        <div class="w-full justify-start flex gap-4 md:gap-10">
            <label class="radio-label flex items-center gap-1 md:gap-2 text-base md:text-lg" for="conditionNew">
                <input id="conditionNew" class="md:w-6 md:h-6 w-3 h-3 checked:text-green-500  text-green-500" name="condition" value="New"
                       type="radio">
                New
            </label>
            <label class="radio-label flex items-center gap-1 md:gap-2 text-base md:text-lg" for="conditionUsed">
                <input id="conditionUsed" class="md:w-6 md:h-6 w-3 h-3 bg-green-500 checked:bg-green-500 text-green-500" name="condition" value="Used"
                       type="radio">
                Used
            </label>
        </div>
    </div>
    <div class="w-full flex justify-between items-center gap-4 sm:gap-4 flex-col sm:flex-row">
        <div class="w-full sm:w-96 h-full flex flex-wrap flex-col justify-start text-start items-center gap-2">
            <h1 class="w-full text-lg text-gray-400 font-semibold">Product Description
                <span class="text-red-600"> * </span>
            </h1>
            <p class="max-w-full flex-wrap">Make sure the product description contains a detailed explanation regarding
                your product so that buyers can easily understand and find your product </p>
        </div>
        <div class="w-full">
            <textarea class="input-style overflow-hidden w-full resize-none" name="description" id="description" cols="8"
                rows="8">{{ old('description') }}</textarea>
        </div>
    </div>
</div>
