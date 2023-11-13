@extends('templates.template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen flex flex-col gap-8">
        <div class="flex md:flex-row flex-col gap-8 relative">
            <x-product-image-view :product_id="$product_id"/>
            <x-product-catalog :product_id="$product_id"/>
        </div>
        <div class="w-[75vw] pb-16">
            <div class="flex flex-col gap-5">
                <h1 class="text-4xl font-bold">Recommended for you</h1>
                <div class="flex flex-row flex-wrap gap-3">
                    @foreach($recommendedProducts as $product)
                        <x-product-card :productId="$product->id"/>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
