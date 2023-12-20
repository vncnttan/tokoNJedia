@extends('templates.template')

@section('title', 'Home')

@section('content')
    <div class="xl:mx-80 mt-6 mb-10 mx-2 flex flex-col gap-10">
        <div class="flex flex-col gap-6">
            <div class="text-4xl font-bold">
                {{ $productPromos[0]->Promo->promo_name . ' Promo' }}
            </div>
            <img src="{{ $productPromos[0]->Promo->promo_image }}"
                 class="w-full h-96 object-cover rounded-md shadow-md"
                 alt="Promo Banner">
            <div class="">
                {{ $productPromos[0]->Promo->promo_description }}
            </div>
        </div>
        <div>
            <div class="text-2xl font-bold">
                Our Best Deals
            </div>
            <div class="md:my-8 flex flex-row flex-wrap gap-3 relative place-items-start">
                @foreach($productPromos as $productPromo)
                    <x-product-card :productId="$productPromo->Product->id" :productPromoId="$productPromo->id" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
