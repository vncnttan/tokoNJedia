@extends('templates.template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen flex md:flex-row flex-col gap-8">
        <x-product-image-view :product_id="$product_id"/>
        <x-product-catalog :product_id="$product_id"/>
    </div>
@endsection
