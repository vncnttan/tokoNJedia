<div class="w-48 h-48 relative">
    <img src="{{ $profileImage ? $profileImage->temporaryUrl() : $merchant->image ?? asset('assets/logo/logo.png') }}" alt="Update Merchant Profile Image"
         class="rounded-full object-cover border border-gray-300 w-full h-full">

    <label>
        <input wire:file="profileImage" wire:model="profileImage" name="profileImage" type="file" accept="image/*" class="hidden">
        <button type="button" id="uploadButton" class="absolute bottom-0 right-0 p-2 !bg-gray-300 rounded-full hover:!bg-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" data-slot="icon" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
            </svg>
        </button>
    </label>

    <script>
        document.getElementById('uploadButton').addEventListener('click', function () {
            document.querySelector('input[name="profileImage"]').click();
        });
    </script>
</div>
