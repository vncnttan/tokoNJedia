@extends('templates.template')

@section('title', 'Merchant')

@section('content')
    <div class="max-w-7xl w-full flex-1 mx-auto flex justify-center gap-8 p-4 sm:px-6 lg:px-8 mb-16">
        @include('components.profile.profile-sidebar')
        @include('components.profile.profile-location')
    </div>

@endsection
