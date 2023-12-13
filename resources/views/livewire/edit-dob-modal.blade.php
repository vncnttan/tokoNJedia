<div class="flex flex-col p-8 gap-8 box-border ">
    @if (Auth::user()->dob == null)
        <h1 class="w-full font-bold text-2xl">Insert Date of Birth</h1>
    @else
        <h1 class="w-full font-bold text-2xl">Edit Date of Birth</h1>
    @endif
    <form class="w-full flex flex-col gap-8" wire:submit.prevent='update'>
        <div class="w-full flex flex-col gap-1">
            <p class="text-sm text-gray-500">Date of Birth</p>
            <input wire:model='dob' class="input-style" type="date" name="dob">
            <p class="text-sm text-gray-500">1 January 1970 - 31 December 2009</p>
        </div>
        <button
            class="w-full text-xl text-white font-semibold bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
