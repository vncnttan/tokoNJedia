@extends('templates.template')

@section('title', 'Add Product')

@section('content')
    <form wire:submit.prevent action="/product" method="POST" enctype="multipart/form-data"  class="max-w-7xl w-full h-full flex flex-col justify-center items-center gap-8 p-4 sm:p-8 box-border">
        @csrf
        <div class="w-full">
            <h1 class="text-2xl font-bold text-black pl-4 sm:p-0">Add Product</h1>
        </div>
        @livewire('add-product-information')
        @livewire('add-product-detail')
        @livewire('add-product-variant')
        <div class="w-full flex justify-end items-center font-semibold text-md gap-4">
            <a href="/merchant/manage-product" type="button" class="w-40 bg-white text-gray-500 hover:bg-gray-200 py-2 rounded-md ring-1 ring-gray-300 text-center">Cancel</a>
            <button class="w-40 bg-green-600 hover:bg-green-700 text-white py-2 rounded-md">Save</button>
        </div>
    </form>
@endsection
