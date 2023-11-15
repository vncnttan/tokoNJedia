<div class="w-full" x-data="{ categoryDropdown: false, selectedCategory: '', selectedCategoryName: 'Product Category' }" @click.away="categoryDropdown = false">

    <button x-show="!categoryDropdown"
        class="w-full p-2 ring-1 ring-gray-300 rounded-lg flex justify-between items-center gap-4"
        @click="categoryDropdown = !categoryDropdown">
        <h1 class="text-sm font-medium text-gray-500">
            <p x-text="selectedCategoryName"></p>
        </h1>
        <div class="ml-auto">
            <svg x-show="!categoryDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
            <svg x-show="categoryDropdown" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
            </svg>
        </div>
    </button>
    <input x-show="categoryDropdown" wire:model.live="search" type="text" placeholder="Search Category..."
        class="w-full input-style" x-model="searchQuery"
        @click.away="categoryDropdown = false">
    <div class="relative w-full flex gap-4 justify-start mt-1 ">
        <div x-show="categoryDropdown"
            class="absolute z-10 w-full max-h-40 overflow-y-auto left-0 bg-white shadow-md rounded-md text-sm font-normal text-start">
            @foreach ($categories as $c)
                <button class="w-full p-2 bg-white hover:bg-gray-300 rounded-md text-black text-md flex justify-start"
                    @click="selectedCategory = '{{ $c->id }}'; categoryDropdown = false; selectedCategoryName = '{{ $c->name }}'">
                    <h1>{{ $c->name }}</h1>
                </button>
            @endforeach
        </div>
    </div>
</div>
