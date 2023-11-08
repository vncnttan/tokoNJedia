@extends('templates.template')

@section('title', 'Home')

@section('content')
    <div class="xl:mx-80 my-10 md:mx-2 flex flex-row flex-wrap gap-4">
        @foreach($recommendedProducts as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
@endsection
