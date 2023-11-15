@extends('templates.template')

@section('content')
    <div class="max-w-7xl w-full h-full flex flex-col justify-center items-center gap-8 p-8 box-border">
        <div class="w-full">
            <h1 class="text-2xl font-bold text-black">Add Product</h1>
        </div>
        <div
            class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center p-10 gap-8">
            <h1 class="w-full text-2xl font-bold text-black">Product Information</h1>
            <div class="w-full flex justify-between items-center g  ap-4">
                <div class="w-96 flex flex-col justify-start text-start items-center gap-2">
                    <h1 class="w-full text-lg text-gray-400">Product Name</h1>
                    <p class="w-full">Product name min. 3 character</p>
                </div>
                <div class="w-full">
                    <input type="text" class="input-style w-full"
                        placeholder="Example: Nike Man Shoes (Product Type/Category/Brand/Other)">
                </div>
            </div>
            <div class="w-full flex justify-between items-center gap-4">
                <div class="w-96 flex flex-col justify-start text-start items-center gap-2">
                    <h1 class="w-full text-lg text-gray-400">Category</h1>
                    <p class="w-full">Choose category from the list</p>
                </div>
                @livewire('product-category-dropdown')
            </div>
        </div>
        <div
            class="w-full bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center p-10 gap-8">
            <h1 class="w-full text-2xl font-bold text-black">Product Detail</h1>
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
    </div>
@endsection
