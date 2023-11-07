@extends('templates.template')

@section('title', 'Profile')

@section('content')
    <div class="max-w-7xl w-full flex-1 mx-auto flex justify-center gap-8 p-4 sm:px-6 lg:px-8">
        <div class="flex-grow w-96 rounded-lg shadow-card bg-white">
            <div class="relative w-full h-full flex flex-col items-center">
                <div class="w-full flex items-center gap-4 p-4 box-border border-b-2">
                    <a class="w-12 h-12 rounded-full">
                        <img class="w-full h-full rounded-full object-cover" src="{{ Auth::user()->image }}" alt="">
                    </a>
                    <h1 class="font-semibold">{{ Auth::user()->email }}</h1>
                </div>
                <div class="w-full flex flex-col items-center gap-4 p-4 box-border border-b-2 ">
                    <div class="w-full flex justify-between items-center">
                        <div class="flex items-center gap-1">
                            <x-far-money-bill-alt class="icon-size" />
                            <h1>Balance</h1>
                        </div>
                        <h1 class="">Rp{{ Auth::user()->balance }}</h1>
                    </div>
                </div>
                <form class="w-full flex items-center gap-4 p-4 box-border hover:bg-gray-200 cursor-pointer" action="/logout"
                    method="GET">
                    <button class="w-full flex items-center gap-1" type="submit">
                        <x-eos-logout class="icon-size" />
                        <h1>Logout</h1>
                    </button>
                </form>
            </div>
        </div>
        @include('components.profile.profile-biodata')
    </div>
@endsection
