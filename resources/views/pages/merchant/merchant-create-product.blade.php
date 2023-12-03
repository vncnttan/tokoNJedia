@extends('templates.template')

@section('title', 'Add Product')

@section('content')
    <form wire:submit.prevent action="/product" method="POST" enctype="multipart/form-data"  class="max-w-7xl w-full h-full flex flex-col justify-center items-center gap-8 p-8 box-border">
        @csrf
        <div class="w-full">
            <h1 class="text-2xl font-bold text-black">Add Product</h1>
        </div>
        @livewire('add-product-information')
        @livewire('add-product-detail')
        @livewire('add-product-variant')
        <div class="w-full flex justify-end items-center font-semibold text-md gap-8">
            <a href="/merchant/manage-product" type="button" class="w-40 bg-white text-gray-500 py-2 rounded-md ring-1 ring-gray-300 text-center">Cancel</a>
            <button class="w-40 bg-green-500  text-white py-2 rounded-md">Save</button>
        </div>
    </form>
@endsection
