<div class="flex flex-col p-8 gap-8 box-border">
    @if (Auth::user()->gender == null)
        <h1 class="w-full font-bold text-2xl">Insert Gender</h1>
    @else
        <h1 class="w-full font-bold text-2xl">Edit Gender</h1>
    @endif
    <form class="w-full flex flex-col gap-8" wire:submit.prevent='update'>
        <input type="hidden" wire:model="gender">
        <div class="w-full flex flex-col gap-1">
            <p class="text-md font-semibold">Gender</p>
            <div class="flex text-center gap-2">
                <button type="button"
                    wire:click="$set('gender', 'Male')"
                    class="w-full px-4 py-2 border {{ $gender == 'Male' ? '!border-blue-500 !bg-blue-500 text-white' : '!border-blue-500 !text-blue-500' }} hover:!bg-blue-500 hover:text-white ">
                    Male
                </button>
                <button type="button"
                    wire:click="$set('gender', 'Female')"
                    class="w-full px-4 py-2 border {{ $gender == 'Female' ? '!border-pink-500 !bg-pink-500 text-white' : '!border-pink-500 !text-pink-500' }} hover:!bg-pink-500 hover:text-white ">
                    Female
                </button>
                <button type="button"
                    wire:click="$set('gender', 'Other')"
                    class="w-full px-4 py-2 border {{ $gender == 'Other' ? '!border-green-500 !bg-green-500 text-white' : '!border-green-500 !text-green-500' }} hover:!bg-green-500 hover:text-white ">
                    Other
                </button>
            </div>
        </div>
        <button
            class="w-full text-xl text-white font-semibold bg-green-500 rounded-lg flex justify-center p-2 box-border">Save</button>
    </form>
</div>
