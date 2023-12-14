<div class="flex flex-col p-8 gap-8 box-border">
    @if (Auth::user()->phone == null)
        <h1 class="w-full font-bold text-2xl">Insert Phone</h1>
    @else
        <h1 class="w-full font-bold text-2xl">Edit Phone</h1>
    @endif
        <form class="w-full flex flex-col gap-8" wire:submit.prevent='update'>
        <div class="w-full flex flex-col gap-1 ">
            <p class="text-sm text-gray-500">Phone</p>
            <label class="w-full">
                <input wire:model="phone" class="input-style w-full" type="text" value="$phone"
                name="phone" placeholder="ex. 0812345678910">
            </label>
        </div>
        <button
            class="w-full text-xl text-white font-semibold   bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
