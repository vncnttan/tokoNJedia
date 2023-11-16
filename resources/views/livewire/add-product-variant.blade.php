<div class="w-full flex flex-col flex-wrap justify-center items-center gap-4">
    @foreach()
    <div class="w-full flex justify-between items-center gap-4">
        <div class="w-96 flex flex-col justify-start text-start items-center gap-2 flex-wrap">
            <h1 class="w-full text-lg text-gray-400">Product Image</h1>
            <p class="w-full">File Size: Maximum 10.000.000 bytes (10 Megabytes). File
                extension
                allowed: .JPG, .JPEG, .PNG</p>
        </div>
        @livewire('upload-product-image-component', ['slot' => 5])
    </div>
</div>

