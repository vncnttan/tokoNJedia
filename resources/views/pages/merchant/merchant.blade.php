@extends('templates.template')

@section('title', 'Merchant')

@section('content')
    <div class="w-full h-full flex-1 flex justify-center items-start "
         x-data="{ selectedTab: 'home', showDropdown: false }">
        @include('components.merchant.merchant-sidebar')
        <div class="w-full">
            @yield('merchant-content')
        </div>
    </div>

@endsection
