<div class="w-full flex flex-col gap-4">
    <div class="w-full flex gap-2 place-items-center box-border">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6 icon-size">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <h1 class="text-2xl font-semibold text-black">{{ Auth::user()->username }}</h1>
    </div>
    {{ $user->location }}

    <div class="flex-grow w-full rounded-lg border-[1px] border-gray-200 bg-white">
        <div class="w-full h-full p-8 box-border flex flex-col justify-start items-start gap-8">
            <div class="ml-auto rounded-lg bg-green-600">
                <button class="px-3.5 py-2 text-white font-bold" onclick="Livewire.emit('openModal', 'add-location-modal')">
                    + Add New Address
                </button>
            </div>
        </div>
    </div>
</div>
