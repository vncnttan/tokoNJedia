@extends('templates.template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen flex flex-row">
{{--        The images section--}}
            <x-product-image-view :product_id="$product_id" />
        asdfs
    </div>
@endsection
