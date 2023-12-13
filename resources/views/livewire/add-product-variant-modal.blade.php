<div class="w-full p-10 box-border flex flex-col justify-center items-center gap-8">
    <h1 class="w-full text-xl font-bold text-black">Add Product Variant</h1>
    <form class="w-full flex flex-col gap-6" wire:submit.prevent='store'>
        <div class="w-full flex flex-col gap-1">
            <label for="" class="text-black font-semibold">Product Variant Name</label>
            <input wire:model="name" type="text" class="input-style w-full"
                placeholder="Example: Nike Man Shoes Variant 1 (Product Type/Brand/Other)">
            <p class="w-full text-gray-500 text-xs">Product variant name min. 3 character</p>
        </div>
        <div class="w-full flex flex-col gap-1">
            <label for="" class="text-black font-semibold">Product Variant Price</label>
            <input wire:model="price" type="number" class="input-style w-full"
                placeholder="Example: 50000">
            <p class="w-full text-gray-500 text-xs">Product variant price must be more than 0</p>
        </div>
        <div class="w-full flex flex-col gap-1">
            <label for="" class="text-black font-semibold">Product Variant Stock</label>
            <input wire:model="stock" type="number" class="input-style w-full"
                placeholder="Example: 50">
            <p class="w-full text-gray-500 text-xs">Product variant stock must be more than 0</p>
        </div>
        <button  type="submit" class="w-full p-2 text-white font-semibold text-lg !bg-green-500 rounded-md">Save</button>
    </form>
</div>
