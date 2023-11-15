@extends('pages.merchant.merchant')

@section('merchant-content')
    <div class="w-full h-full flex flex-col justify-center items-center gap-8 p-8 box-border">
        <div class="w-full flex justify-between items-center">
            <h1 class="text-2xl font-bold text-black">Product List</h1>
            <div>
                <button class="text-white font-bold bg-green-500 p-2 rounded-md">+ Add Product</button>
            </div>
        </div>
        <div
            class="w-full min-h-[500px] bg-white flex-grow shadow-container rounded-lg flex flex-col justify-start items-center">
            <div class="w-full box-border border-b-2 border-gray-100">
                <h1 class="text-green-500 text-xl font-bold border-b-2 border-green-500 w-fit py-2 px-6 box-border">All
                    Products</h1>
            </div>
            <div class="w-full p-4 box-border flex justify-between items-center border-b-2 border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 absolute m-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input type="text" class="input-style px-8" placeholder="Search Product">
            </div>
            <div class="w-full p-4 flex border-b-2 border-gray-100 justify-between items-center">
                <div class="w-1/3 flex justify-start items-center gap-4 ">
                    Product Information
                </div>
                <div class="w-2/3 flex justify-start items-center ">
                    <div class="w-1/4 flex justify-start items-center ">
                        <h1>Price</h1>
                    </div>
                    <div class="w-1/4 flex justify-start items-center">
                        <h1>Stock</h1>
                    </div>
                    <div class="w-1/4 h-full flex flex-wrap justify-start items-center gap-2">
                        <h1>Category</h1>
                    </div>
                    <div class="w-1/4"></div>
                </div>
            </div>

            <div class="w-full h-full flex flex-col justify-center items-center">
                @foreach ($products as $product)
                {{-- {{dd($product)}} --}}
                    @include('components.merchant.merchant-product-card', ['product' => $product])
                @endforeach
            </div>
        </div>
    </div>
@endsection