@extends('templates.template')

@section('title', 'Home')

@section('content')
    <div class="xl:px-80 pt-6 px-2 flex flex-col gap-10">
        <div class="flex flex-col">
            <x-promo-carousel/>
        </div>
        <div class="flex flex-col">
            <div class="border-2 border-gray-500 border-opacity-10 p-4 flex flex-row gap-8 rounded-xl">
                <div class="xl:flex hidden flex-col gap-6">
                    <h1 class="font-bold text-xl"> Favorite Categories </h1>
                    <div class="flex flex-row gap-2">
                        @foreach($productCategories as $productCategory)
                            <div
                                class="rounded-md flex flex-col place-items-center justify-center gap-2 p-4 font-semibold border-gray-500 border-opacity-20 border">
                                @if($productCategory->products->count() > 0 && $productCategory->products[0]->productImages->count() > 0)
                                    <img src="{{ $productCategory->products[0]->productImages[0]->image }}"
                                         alt="{{ $productCategory->name }}"
                                         class="sm:w-32 w-16 sm:h-32 h-16 object-cover rounded-md"/>
                                @else
                                    <img src="https://placehold.co/600x400"
                                         class="sm:w-32 w-16 sm:h-32 h-16 object-cover rounded-md"
                                         alt="{{$productCategory->name}}"/>
                                @endif
                                <div>{{ $productCategory->name }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-6 flex-grow">
                    <h1 class="font-bold text-xl"> Top up & Bills </h1>
                    <form class="flex flex-row place-items-end md:flex-col gap-4" action="/transaction/electricity" method="POST">
                        @csrf
                        <div class="flex flex-col w-full gap-1">
                            <label for="subscriptionNumber" class="font-semibold text-gray-500">Subscription Number</label>
                            <input name="subscriptionNumber" id="subscriptionNumber" class="w-full rounded-md border-gray-500 border p-1.5" placeholder="ex. 12345678910" type="number"/>
                            <p class="text-xs text-gray-500">Must be between 11 and 12 numbers</p>
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <label for="nominal" class="font-semibold text-gray-500">Nominal</label>
                            <input name="nominal" id="nominal" class="w-full rounded-md border-gray-500 border p-1.5" placeholder="ex. 50000" type="number"/>
                            <p class="text-xs text-gray-500">Must be between 10000 and 1000000</p>
                        </div>

                        <button class="p-2 w-full h-fit bg-green-600 hover:bg-green-700 text-white rounded-md font-semibold">
                            Pay
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <x-flash-sale-product-section/>
        </div>
        <div class="flex flex-col pb-16">
            <h1 class="font-bold text-xl"> Based on your activity </h1>
            <x-recommended-product request-count="12"/>
        </div>
    </div>
@endsection
