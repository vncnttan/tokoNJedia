<div class="w-full p-10 box-border flex flex-col justify-between items-center gap-4">
    <h1 class="text-4xl text-green-500 font-bold self-start">Edit Product</h1>
    <div class="w-full grid grid-cols-5 gap-4">
        @foreach ($images as $index => $image)
            <label
                class="relative group w-36 h-36 border-2 border-dashed rounded-lg text-sm font-semibold cursor-pointer flex flex-col justify-center items-center text-gray-500 hover:text-green-500 hover:border-green-500">
                <input wire:model="images.{{ $index }}" name="images[{{ $index }}]" type="file"
                       accept="image/*" class="hidden">
                @if ($index < count($product_images) && $product_images[$index] && $image==null)
                    <img src="{{ $product_images[$index] }}" class="w-full h-full object-contain" alt="">
                    <button type="button"
                            class="group-hover:flex hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white p-2 w-full h-full bg-black bg-opacity-25 justify-center items-center"
                            wire:click="remove({{ $index }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                @elseif($image)
                    <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-contain" alt="">
                    <button type="button"
                            class="group-hover:flex hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white p-2 w-full h-full bg-black bg-opacity-25 justify-center items-center"
                            wire:click="remove({{ $index }})">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                    <p>Image {{ $index + 1 }}</p>
                @endif
            </label>
        @endforeach
    </div>
    <div class=" w-full flex justify-center items-end gap-8">
        <div class="w-full flex flex-col justify-center items-center gap-4">
            <div class="w-full flex flex-col gap-2">
                <label for="nameInput">Product Name
                    <span class="text-red-500">*</span>
                </label>
                <input id="nameInput" wire:model="name" class="input-style w-full" type="text">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="">Product Category
                    <span class="text-red-500">*</span>
                </label>
                @livewire('product-category-dropdown', ['currCategory' => $category])
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="descInput">Product Description
                    <span class="text-red-500">*</span>
                </label>
                <textarea class="w-full ring-1 ring-gray-200 input-style p-2" wire:model="description" name="" id="descInput"
                          cols="30" rows="5"></textarea>
            </div>
        </div>
        <button wire:loading.attr='disabled' wire:click='save' class="px-10 py-2 text-white
            font-semibold bg-green-500 rounded-md disabled:cursor-not-allowed"> Save
        </button>
    </div>

</div>
