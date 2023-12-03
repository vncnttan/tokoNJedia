<div class="relative w-full p-10 box-border flex flex-col justify-between items-center gap-4">
    <h1 class="text-4xl text-green-500 font-bold self-start">Edit Product Variant</h1>
    <div class=" w-full flex justify-center items-end gap-8">
        <div class="w-full flex flex-col justify-center items-center gap-4">
            <div class="w-full flex flex-col gap-2">
                <label for="">Product Variant Name</label>
                <input wire:model="name" class="input-style w-full" type="text">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="">Product Variant Price</label>
                <input wire:model="price" class="input-style w-full" type="text">
            </div>
            <div class="w-full flex flex-col gap-2">
                <label for="">Product Variant Stock</label>
                <input wire:model="stock" class="input-style w-full" type="text">
            </div>
        </div>
    </div>
    <div class="w-full flex justify-end items-center gap-4">
        <button wire:loading.attr='disabled' wire:click='save'
            class="px-10 py-2 text-green-500 font-semibold ring-1 ring-green-500 rounded-md disabled:cursor-not-allowed">Cancel</button>
        <button wire:loading.attr='disabled' wire:click='save'
            class="px-10 py-2 text-white font-semibold bg-green-500 rounded-md disabled:cursor-not-allowed hover:bg-green-600">Save</button>
    </div>
</div>
