<div class="w-full flex flex-col " x-data="{ showDropdown: false }">
    <button class="z-10 w-full px-4 py-2 box-border rounded-md bg-gray-200 flex justify-between items-center"
        @click="showDropdown = !showDropdown">
        <h1 class="text-black text-sm font-bold">Look Product Variant</h1>
        <div class="ml-auto">
            <svg x-show="!showDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="showDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </div>
    </button>
    <div class="w-full flex justify-start ">
        <div x-show="showDropdown" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform translate-y-[-50%] opacity-0"
            x-transition:enter-end="transform translate-y-0 opacity-100"
            x-transition:leave="transition ease-out duration-100"
            x-transition:leave-start="transform translate-y-0 opacity-100"
            x-transition:leave-end="transform translate-y-[-50%] opacity-0"
            class="z-0 w-full px-2 rounded-md text-sm font-normal text-start bg-gray-100 max-h-60   ">
            @foreach ($variants as $variant)
                <div class="pl-4 box-border py-4 flex justify-between items-center border-b-2 border-gray-200">
                    <div class="w-full flex text-md text-black font-base ">
                        <div class=" w-1/3 flex gap-2 items-center">
                            <h1>
                                {{ $variant->name }}
                            </h1>
                        </div>
                        <div class=" w-2/3 flex justify-start items-center" x-data="{ settingDropdown: false }">
                            <div class=" w-1/4   flex gap-2 items-center">
                                <h1>
                                    {{ $variant->price }}
                                </h1>
                            </div>
                            <div class=" w-1/4 flex gap-2 items-center">
                                <h1>
                                    {{ $variant->stock }}
                                </h1>
                            </div>
                            <div class="w-1/4 ">

                            </div>
                            <div class="relative w-1/4 h-full flex flex-col justify-center items-start">
                                <button
                                    class=" p-2 ring-1 ring-gray-300 rounded-lg flex justify-between items-center gap-4"
                                    @click="settingDropdown = !settingDropdown" @click.away="settingDropdown = false">
                                    <h1 class="text-sm font-medium text-gray-500">Manage</h1>
                                    <div class="ml-auto">
                                        <svg x-show="!settingDropdown" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                        <svg x-show="settingDropdown" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                                        </svg>
                                    </div>
                                </button>
                                <div class="w-full flex gap-4 justify-start mt-1">
                                    <div x-show="settingDropdown"
                                        class="absolute z-[15] w-2/3 left-0 bg-white shadow-md rounded-md text-sm font-normal text-start">
                                        <button type="button"
                                            class="w-full  p-2 hover:bg-slate-100 text-black cursor-pointer flex justify-start items-center gap-4"
                                            onclick='Livewire.emit("openModal", "edit-product-variant-modal", @json([$product, $variant]))'
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                            <h1>Edit</h1>
                                        </button>
                                        <button
                                            class="w-full p-2 hover:bg-slate-100 text-black cursor-pointer flex justify-start items-center gap-4"
                                            type="button" wire:click="destroy('{{ $variant->id }}')"
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                            <h1>Delete</h1>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
