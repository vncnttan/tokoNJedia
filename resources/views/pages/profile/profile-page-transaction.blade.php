@extends('templates.template')

@section('title', 'Transaction History')

@section('content')
    <div class="max-w-7xl w-full flex-1 mx-auto flex-col md:flex-row  mt-3.5 flex justify-center gap-8 p-4 sm:px-6 lg:px-8 mb-16">
        <x-profile.profile-sidebar />
        <x-profile.profile-transaction />
    </div>

@endsection
