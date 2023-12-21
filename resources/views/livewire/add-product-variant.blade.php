<div class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-start p-6 sm:p-10 gap-8">
    <div class="w-full flex justify-between items-center">
        <div class="w-96 flex-wrap">
            <h1 class="w-full text-2xl font-bold text-black">Product Variant</h1>
            <p>Add variant so that customer can choose the right product. Enter max. 5 types of variants</p>
        </div>
    </div>

    <div class="relative w-full flex flex-col flex-wrap justify-center items-start gap-4">
        @foreach ($variants as $index => $variant)
            <hr class="w-full !bg-gray-100 bg-opacity-20" style="color: #d1d5db">
            <h1 class="text-lg font-bold text-black">Product Variant {{ $index + 1 }}</h1>
            <div class="w-full flex justify-between items-center gap-4 flex-col sm:flex-row">
                <div class="w-full sm:w-96 flex flex-col justify-start text-start items-center gap-2 flex-wrap">
                    <h1 class="w-full text-lg text-gray-400">Product Variant Name
                        <span class="text-red-600"> * </span>
                    </h1>
                    <p class="w-full">Product variant name min. 3 character</p>
                </div>
                <label class="w-full">
                    <input type="text" wire:model="variants.{{$index}}.name" value="{{old('variants.$index.name')}}" name="variant_name[{{ $index }}]" class="input-style w-full"
                        placeholder="Example: Nike Man Shoes Variant 1 (Product Type/Category/Brand/Other)">
                </label>
            </div>

            <div class="w-full flex justify-between items-center  gap-4 flex-col sm:flex-row">
                <div class="w-full sm:w-96 flex flex-col justify-start text-start items-center gap-2 flex-wrap ">
                    <h1 class="w-full text-lg text-gray-400">Product Variant Price
                        <span class="text-red-600"> * </span>
                    </h1>
                    <p class="w-full">Product variant price must be more than 0</p>
                </div>
                <label class="w-full">
                    <input type="number" wire:model="variants.{{$index}}.price" value="variants.{{$index}}.price" name="variant_price[{{ $index }}]" class="input-style w-full" placeholder="Example: 50000">
                </label>
            </div>
            <div class="w-full flex justify-between items-center gap-4 flex-col sm:flex-row">
                <div class="w-full sm:w-96 flex flex-col justify-start text-start items-center gap-2 flex-wrap">
                    <h1 class="w-full text-lg text-gray-400">Product Variant Stock
                        <span class="text-red-600"> * </span>
                    </h1>
                    <p class="w-full">Product variant stock must be more than 0</p>
                </div>
                <label class="w-full">
                    <input type="number" wire:model="variants.{{$index}}.stock" value="variants.{{$index}}.stock" name="variant_stock[{{ $index }}]" class="input-style w-full" placeholder="Example: 50">
                </label>
            </div>
            {{-- <button wire:click="removeVariant({{ $index }})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                  </svg>
            </button> --}}
            @if ($slot > 2)
            <button type="button" class="bg-red-500 py-2 px-8 rounded-md text-white font-medium text-md"
                wire:click="removeVariant({{ $index }})">Delete</button>
            @endif
        @endforeach
        <button type="button" class="py-2 px-16 rounded-md bg-white ring-1 ring-green-500 text-green-500 font-semibold"
            wire:click="addVariant">+ Add Variant</button>
    </div>
</div>
