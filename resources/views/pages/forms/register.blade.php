@extends('templates.template')

@section('title', 'Register')

@section('content')
    <div class="h-screen w-screen flex flex-col py-16 justify-between items-center bg-white">
        <div class="w-full sm:block hidden">
            <div class="flex justify-center items-center text-6xl text-green-500 font-semibold">
                <a href="/">
                    <h1 class="font-mandala">NJpediaCX</h1>
                </a>
            </div>
        </div>
        <div class="w-full h-full flex items-center place-content-evenly justify-evenly">
            <div class="hidden lg:block">
                <div class="w-full h-full flex flex-col justify-center items-end  text-xl">
                    <div class=" h-full flex flex-col justify-center items-center">
                        <img class="w-96 h-96 object-contain"
                             src="https://images.tokopedia.net/img/content/register_new.png" alt="Register Image">
                        <h1 class="text-2xl font-bold">Agar tidak terputus minimal seratus</h1>
                    </div>
                </div>
            </div>
            <div
                class="h-full flex flex-col justify-center place-items-center text-xl w-full md:w-96 md:min-h-96 md:p-8 p-4">
                <div
                    class="w-full flex sm:w-96 sm:min-h-96 flex-col justify-start shadow-gray-300 p-8 box-border rounded-md shadow-box gap-8 place-items-center">
                    <div class="w-full flex flex-col justify-center gap-2">
                        <h1 class="text-2xl font-bold">Register Now</h1>
                        <div class="w-full flex justify-center items-center text-base gap-1">
                            <h1>Don't have an account?</h1>
                            <a class="text-green-500 cursor-pointer font-medium" href="/login">Login</a>
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
                            <button class="w-full p-2 my-6 bg-green-500 rounded-lg text-white text-xl font-bold">
                                Register
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
@endsection
