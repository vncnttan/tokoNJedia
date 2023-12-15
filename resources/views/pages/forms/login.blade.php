@extends('templates.form')

@section('title', 'Login')

@section('content')
    <div class="h-screen w-full py-10 flex flex-col justify-between items-center box-border" id="login-full-screen">
        <div class="w-full sm:block hidden">
            <div class="flex justify-center items-center text-5xl text-green-500 font-semibold">
                <a href="/">
                    <h1 class="font-mandala">tokoNJedia</h1>
                </a>
            </div>
        </div>
        <div class="w-full h-full flex items-center place-content-evenly justify-evenly">
            <div
                class="h-full flex flex-col justify-center items-center text-xl w-full md:w-96 md:min-h-96 md:p-8 p-4">
                <div
                    class="w-full flex sm:w-96 sm:min-h-96 flex-col justify-center bg-white shadow-gray-300 p-8 box-border rounded-md shadow-box gap-4 place-items-center">
                    <div class="w-full flex flex-col justify-center items-center gap-2">
                        <h1 class="text-2xl font-bold">Welcome Back!</h1>
                        <div class="w-full flex justify-center items-center text-base gap-1 bg-red">
                            <h1>Don't have an account?</h1>
                            <a class="text-green-500 cursor-pointer font-medium" href="/register">Register</a>
                        </div>
                    </div>
                    <div class="w-full h-full flex flex-col justify-start items-center gap-4">
                        <a href="{{ url('auth/google') }}"
                           class="relative w-full flex justify-center items-center border-solid border-gray-400 border-2 rounded-xl p-2 font-medium text-gray-500 text-base">
                            <img class="absolute w-5 h-5 left-0 m-6 box-border" src="{{ asset('assets/google.png') }}"
                                 alt="">
                            Google
                        </a>
                        <div class="w-full flex justify-center items-center gap-2">
                            <hr class="w-full border-t-2 border-gray-300">
                            <h1 class="text-sm text-gray-500">or</h1>
                            <hr class="w-full border-t-2 border-gray-300">
                        </div>
                        <form action="/login" method="POST" class="w-full h-full text-sm flex flex-col gap-1">
                            @csrf
                            <label for="emailInput">Email</label>
                            <input type="text" name="email" id="emailInput" class="input-style" placeholder="Example: email@tokonjedia.com">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="password" id="passwordInput" class="input-style" placeholder="Input password">
                            <p class="text-gray-400">Requirements:</p>
                            <p class="text-gray-400">- All fields must be filled</p>
                            @if ($errors->any())
                                <p class="text-red-500 w-full flex justify-center">
                                    {{ $errors->first() }}
                                </p>
                            @endif
                            <button class="w-full p-2 my-4 bg-green-500 rounded-lg text-white text-xl font-bold">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full sm:block hidden">
            <div class="w-full flex justify-center items-center">
                <span class="text-green-500 font-semibold text-center px-20">&copy; DuTiSa, Breaking and Overcoming
                    Challenges Through Courage, Hardwork, and Persistence</span>
            </div>
        </div>
    </div>

    <style>
        #login-full-screen {
            background-image: url('{{ asset('assets/backgrounds/login-bg.png') }}');
            background-position: center;
            background-size: min(80vw, 80vh);
            background-repeat: no-repeat;
        }
    </style>
@endsection
