@extends('templates.template')

@section('title', 'Detail Page')

@section('content')
    <div class="min-h-screen flex flex-col gap-8">
        {{ $carts }}
    </div>
@endsection
