@extends('templates.template')

@section('title', "$merchant->name")

@section('content')
    {{-- <div class="2xl:px-80 xl:px-48 w-full pt-6 gap-8 pb-10 px-2 flex flex-col"> --}}
    <div class="2xl:max-w-5xl xl:max-w-4xl w-full pt-6 gap-8 pb-10 px-2 flex flex-col">
        @livewire('merchant-header', ['merchant' => $merchant])
        <div class="flex flex-col gap-5">
            <div class="w-full h-10 flex flex-row border-b-[1px] border-gray-400 border-opacity-30">
                <button
                    id="product-button"
                    class="flex flex-row gap-2 text-green-600 border-green-700 w-24 justify-center font-bold border-b-2">
                    Home
                </button>
                <a href="/merchant/{{$merchant->id}}/products">
                    <button
                        id="store-button"
                        class="flex flex-row gap-2 text-gray-400 w-24 justify-center font-bold">
                        Product
                    </button>
                </a>
            </div>
            <div class="relative h-96 mt-6 overflow-hidden rounded-lg md:h-[50vh]">
                <img src="{{$merchant->banner_image ?? asset('assets/logo/banner-merchant.jpeg')}}"
                     class="absolute block w-full h-full object-cover"
                     alt="Merchant Banner">
            </div>
        </div>
        <x-merchant-footer :merchantId="$merchant->id"/>
    </div>
@endsection
