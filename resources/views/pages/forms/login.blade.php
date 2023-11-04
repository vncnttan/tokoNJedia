<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>NJpediaCX</title>
</head>
<body>
<div class="min-w-screen h-screen flex flex-col justify-between items-center bg-white">
    <div class="w-full h-20 flex justify-center items-center text-6xl text-green-500 font-semibold mt-20">
        <h1 class="font-mandala">NJpediaCX</h1>
    </div>
    <div class="w-full h-full flex items-center place-content-evenly justify-evenly">
        <div class="hidden md:block">
            <div class="w-full h-full flex flex-col justify-center items-end  text-xl">
                <div class=" h-full flex flex-col justify-center items-center">
                    <img class="w-96 h-96 object-contain"
                         src="https://images.tokopedia.net/img/content/register_new.png" alt="">
                    <h1 class="text-2xl font-bold">Agar tidak terputus minimal seratus</h1>
                </div>
            </div>
        </div>
        <div class="h-full flex flex-col justify-center place-items-center text-xl">
            <div
                class="w-96 min-h-96 flex flex-col justify-start shadow-gray-300 p-8 box-border rounded-md shadow-box gap-8 place-items-center">
                <div class="w-full flex flex-col justify-center">
                    <h1 class="text-2xl font-bold">Login Now</h1>
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
                        <label for="">Email</label>
                        <input type="text" class="input-style">
                        <label for="" class="text-gray-400">Example: email@njpediacx.com</label>
                        <label for="">Password</label>
                        <input type="password" class="input-style">
                        <label for="" class="text-gray-400">Example: email@njpediacx.com</label>
                        <button class="w-full p-2 my-6 bg-green-500 rounded-lg text-white text-xl font-bold">Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center items-center">
        <span class="text-green-500 font-semibold text-center p-10">&copy; DuTiSa, Breaking and Overcoming Challenges Through Courage, Hardwork, and Persistence</span>
    </div>
</div>
</body>
</html>
