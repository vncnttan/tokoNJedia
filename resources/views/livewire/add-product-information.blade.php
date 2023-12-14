<div class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center p-6 sm:p-10 gap-8">
    <h1 class="w-full text-2xl font-bold text-black">Product Information</h1>
    <div class="w-full flex justify-between items-center gap-1 md:gap-4 flex-col md:flex-row">
        <div class="w-full md:w-96 flex flex-col justify-start text-start items-center gap-1">
            <h1 class="w-full text-lg text-gray-400 font-semibold">Product Name
                <span class="text-red-600"> * </span>
            </h1>
            <p class="w-full">Product name min. 3 character</p>
        </div>
        <div class="w-full">
            <input type="text" name="name" value="{{ old('name') }}" class="input-style w-full"
                placeholder="Example: Nike Man Shoes (Product Type/Category/Brand/Other)">
        </div>
    </div>
    <div class="w-full flex justify-between items-center gap-1 md:gap-4 flex-col md:flex-row">
        <div class="md:w-96 w-full flex flex-col justify-start text-start items-center gap-1">
            <h1 class="w-full text-lg text-gray-400 font-semibold">Category
                <span class="text-red-600"> * </span>
            </h1>
            <p class="w-full">Choose category from the list</p>
        </div>
        @livewire('product-category-dropdown')
    </div>
</div>
