@extends('templates.template')

@section('title', 'Cart')

@section('content')
    <div class="2xl:px-80 xl:px-48 w-full pt-6 gap-8 pb-10 px-2 flex flex-col">
        <x-merchant-header :merchantId="$merchant->id"/>
        <div class="flex flex-col gap-5">
            <div class="w-full h-10 flex flex-row border-b-[1px] border-gray-400 border-opacity-30">
                <a href="/merchant/{{$merchant->id}}">
                    <button
                        id="product-button"
                        class="flex flex-row gap-2 text-gray-400 w-24 justify-center font-bold">
                        Home
                    </button>
                </a>
                <button
                    id="store-button"
                    class="flex flex-row gap-2 text-green-600  border-green-700 border-b-2  w-24 justify-center font-bold">
                    Product
                </button>
            </div>
            <div class="relative mt-6 overflow-hidden rounded-lg">
                <div class="font-bold mb-2">
                    All Product
                </div>
                <div class="flex flex-row flex-wrap gap-3">
                    @foreach($products as $product)
                        <x-product-card :productId="$product->id"/>
                    @endforeach
                </div>
            </div>
        </div>
        <x-merchant-footer :merchantId="$merchant->id"/>
    </div>
@endsection
