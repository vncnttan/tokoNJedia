<div class="w-full flex flex-col" x-data="{ showDropdown: false }">
    <button class="z-10 w-full px-4 py-2 box-border rounded-md bg-gray-100 flex justify-between items-center"
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
            class="z-0 w-full px-2 rounded-md text-sm font-normal text-start bg-gray-100">
            @foreach ($variants as $variant)
                <div class="p-2 box-border py-4 flex justify-between items-center border-b-2 border-gray-200">
                    <div class="w-full flex text-md text-black font-base ">
                        <div class=" w-1/3 flex gap-2 items-center">
                            <h1>
                                {{ $variant->name }}
                            </h1>
                        </div>
                        <div class=" w-1/4 flex gap-2 items-center">
                            <h1>
                                {{ $variant->price }}
                            </h1>
                        </div>
                    </div>
                    <button></button>
                </div>
            @endforeach
        </div>
    </div>
</div>
