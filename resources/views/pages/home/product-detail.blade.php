@extends('templates.template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen flex flex-col gap-8">
        <div class="flex md:flex-row flex-col mt-10 gap-8 relative">
            <x-product-image-view :product_id="$product_id"/>
            <x-product-catalog
                :product_id="$product_id"
                :productPromoId="getMaximumPromo($product_id)"
                :flashSalePromoId="getMaximumPromo($product_id)"
            />
        </div>
        <div class="w-[75vw] pb-16">
            <x-recommended-product :request-count="14"/>
        </div>
    </div>
@endsection
