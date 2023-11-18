@extends('templates.template')

@section('title', "$merchant->name")

@section('content')
    <div class="2xl:px-80 xl:px-48 w-full pt-6 gap-8 pb-10 px-2 flex flex-col">
        <x-merchant-header :merchantId="$merchant->id"/>
        <div class="flex flex-col gap-5">
            <div class="w-full h-10 flex flex-row border-b-[1px] border-gray-400 border-opacity-30">
                <button
                    id="product-button"
                    class="flex flex-row gap-2 text-green-600 border-gray-400 w-24 justify-center font-bold border-b-2">
                    Home
                </button>
                <a href="/merchant/{{$merchant->id}}/products">
                    <button
                        id="store-button"
                        class="flex flex-row gap-2 border-gray-400 text-gray-400 w-24 justify-center font-bold">
                        Product
                    </button>
                </a>
            </div>
            <div class="relative h-96 mt-6 overflow-hidden rounded-lg md:h-[50vh]">
                <img src="{{$merchant->banner_image}}"
                     class="absolute block w-full h-full object-cover"
                     alt="Promo Banner">
            </div>
        </div>
            <div class="pt-16 pb-4 text-gray-600 my-10 border-t-[1px] border-gray-500 border-opacity-30">
            <div class="flex flex-col gap-10">
                <div class="font-bold">
                    Store Information {{ $merchant->name }}
                </div>
                <div class="flex flex-col gap-3">
                    <div class="font-bold text-sm">
                        Description {{ $merchant->name }}
                    </div>
                    <div class="text-xs">
                        {{ $merchant->description }}
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="font-bold text-sm">
                        Open Since
                    </div>
                    <div class="text-xs">
                        {{ $merchant->created_at->format('F Y') }}
                    </div>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="font-bold text-sm">
                        {{$merchant->catch_phrase}}
                    </div>
                    <div class="text-xs">
                        {{ $merchant->full_description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
