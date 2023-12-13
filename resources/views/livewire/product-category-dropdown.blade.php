<div class="w-full" x-data="{ categoryDropdown: false, selectedCategory: '', selectedCategoryName: '{{$category}}', searchQuery: '' }"
    @click.away="categoryDropdown = false">
    <button type="button" x-show="!categoryDropdown"
        class="w-full h-full p-2 ring-1 ring-gray-300 text-black rounded-md flex justify-between items-center gap-4"
        @click.stop="categoryDropdown = !categoryDropdown">
        <p class="text-sm text-black" x-text="selectedCategoryName"></p>
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
    <label>
        <input x-show="categoryDropdown" wire:model.live="search" type="text" placeholder="Search Category..."
            class="w-full input-style" x-model="searchQuery" @click.away="categoryDropdown = false">
    </label>

    <input type="hidden" name="product_category" :value="selectedCategory" x-bind:value="selectedCategory" wire:model="selectedCategory">

    <div class="relative w-full flex gap-4 justify-start mt-1 ">
        <div x-show="categoryDropdown"
            class="absolute z-10 w-full max-h-40 overflow-y-auto left-0 bg-white shadow-md rounded-md text-sm font-normal text-start">
            @foreach ($categories as $c)
                <div class="w-full p-2 bg-white hover:bg-gray-300 rounded-md text-black text-md flex justify-start"
                wire:click="$emit('categoryUpdated', '{{$c->id}}')"
                    @click.stop="selectedCategory = '{{ $c->id }}'; categoryDropdown = false; selectedCategoryName = '{{ $c->name }}';"
                    >
                    <h1>{{ $c->name }}</h1>
                </div>
            @endforeach
        </div>
    </div>
</div>
