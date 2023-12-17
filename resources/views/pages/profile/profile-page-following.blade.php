@extends('templates.template')

@section('title', 'Following')

@section('content')
    <div
        class="max-w-7xl w-full flex-1 mx-auto flex-col md:flex-row  mt-3.5 flex justify-center gap-8 p-4 sm:px-6 lg:px-8 mb-16">
        <x-profile.profile-sidebar/>
        <div class="w-full flex flex-col gap-4">
            <div class="w-full flex gap-2 place-items-center box-border">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="w-6 h-6 icon-size">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h1 class="text-2xl font-semibold text-black">{{ Auth::user()->username }}</h1>
            </div>
            <div class="flex-grow w-full rounded-lg border-[1px] border-gray-200 bg-white">
                <div class="w-full h-full p-8 box-border flex flex-col justify-start items-start gap-8">
                    <h1 class="font-bold text-xl">
                        Following
                    </h1>

                    <div class="flex flex-row flex-wrap gap-3">
                        @foreach($stores as $store)
                            <x-merchant-card :merchantId="$store->id"/>
                        @endforeach
                        @if($stores->count() < 1)
                            <div class="flex flex-row gap-2">
                                <img alt="No Following" src="{{ asset('assets/general/no-following.png') }}"/>
                                <div class="flex flex-col gap-1">
                                    <h1 class="text-xl font-bold ">No Following</h1>
                                    <div class="text-gray-500">
                                        Find your favorite store and follow them to get the latest update!
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
