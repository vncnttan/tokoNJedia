<div class="flex flex-col p-8 gap-8 box-border">
    @if (Auth::user()->username == null)
        <h1 class="w-full font-bold text-2xl">Insert Username</h1>
    @else
        <h1 class="w-full font-bold text-2xl">Edit Username</h1>
    @endif
        <form class="w-full flex flex-col gap-8" wire:submit.prevent='update'>
        <div class="w-full flex flex-col gap-1 ">
            <p class="text-sm text-gray-500">Username</p>
            <input wire:model="username" class="input-style" type="text" value="$username"
            name="username">
            <p class="text-sm text-gray-500">Username could be seen by others</p>
        </div>
        <button
            class="w-full text-xl text-white font-semibold   bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
