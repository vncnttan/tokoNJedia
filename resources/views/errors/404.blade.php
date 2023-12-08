@extends('templates.template')

@section('title', '404 Not Found')

@section('content')
    <div class="xl:mx-80 mt-6 mb-10 mx-2 flex flex-col gap-10 py-16 place-items-center">
        <div class="flex flex-col gap-4 place-items-center">
            <img alt="404 Not Found" class="h-80 w-auto" src="{{ asset('/assets/general/error-not-found.png') }}">
            <h2 class="text-black font-bold text-4xl">Wadoeh, your destination is not found!</h2>
            <h4 class="text-gray-500 font-semibold">Maybe there is a typo? Let's go back before dark!</h4>
        </div>
        <a href="/" class="px-4 py-2 font-bold bg-green-600 rounded-md w-fit text-white ">
            Go back to home
        </a>
    </div>
@endsection
