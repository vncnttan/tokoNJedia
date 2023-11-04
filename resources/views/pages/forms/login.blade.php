@extends('templates.template')

@section('title', 'Login')

@section('content')
    <div class="w-screen h-screen flex flex-col justify-between items-center bg-white py-16" id="login-full-screen">
        <div class="w-full sm:block hidden">
            <div class="flex justify-center items-center text-6xl text-green-500 font-semibold">
                <h1 class="font-mandala">NJpediaCX</h1>
            </div>
        </div>
        <div class="w-full h-full flex items-center place-content-evenly justify-evenly">
            <div class="h-full flex flex-col justify-center place-items-center text-xl w-full md:w-96 md:min-h-96 md:p-16 p-4">
                <div
                    class="w-full flex sm:w-96 sm:min-h-96 flex-col justify-start bg-white shadow-gray-300 p-8 box-border rounded-md shadow-box gap-8 place-items-center">
                    <div class="w-full flex flex-col justify-center gap-2">
                        <h1 class="text-2xl font-bold">Welcome back!</h1>
                        <div class="w-full flex justify-center items-center text-base gap-1">
                            <h1>Don't have an account?</h1>
                            <a class="text-green-500 cursor-pointer font-medium" href="/register">Register</a>
                        </div>
                    </div>
                    <div class="w-full h-full flex flex-col justify-start items-center gap-4">
                        <button
                            class="relative w-full flex justify-center items-center border-solid border-gray-400 border-2 rounded-xl p-2 font-medium text-gray-500 text-base">
                            <img class="absolute w-5 h-5 left-0 m-6 box-border" src="{{ asset('assets/google.png') }}"
                                 alt="">
                            Google
                        </button>
                        <div class="w-full flex justify-center items-center gap-2">
                            <hr class="w-full border-t-2 border-gray-300">
                            <h1 class="text-sm text-gray-500">or</h1>
                            <hr class="w-full border-t-2 border-gray-300">
                        </div>
                        <form action="" class="w-full h-full text-sm flex flex-col gap-1">
                            <label for="emailInput">Email</label>
                            <input type="text" name="email" id="emailInput" class="input-style">
                            <p class="text-gray-400">Example: email@njpediacx.com</p>
                            <label for="passwordInput">Password</label>
                            <input type="password" id="passwordInput" class="input-style">
                            <p class="text-gray-400">Requirements:</p>
{{--                            TODO: Create auto requirements checker for the password (Easy Medium Strong)--}}
                            <button class="w-full p-2 my-6 bg-green-500 rounded-lg text-white text-xl font-bold">Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full sm:block hidden">
            <div class="w-full flex justify-center items-center">
                <span class="text-green-500 font-semibold text-center px-20">&copy; DuTiSa, Breaking and Overcoming Challenges Through Courage, Hardwork, and Persistence</span>
            </div>
        </div>
    </div>

    <style>
        #login-full-screen {
            background-image: url('{{asset('assets/backgrounds/login-bg.png')}}');
            background-position: center;
            background-size: min(80vw, 80vh);
            background-repeat: no-repeat;
        }
    </style>
@endsection
