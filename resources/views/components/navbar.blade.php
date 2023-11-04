<div class="fixed top-0 left-0 right-0 min-w-screen h-20 bg-white border-b-2 border-solid border-gray-500">
    <div class="w-full h-20 flex justify-between items-center gap-8 p-6 box-border">
        <div class="h-full flex justify-center items-center">
            <h1 class="text-green-500 font-semibold font-mandala text-2xl">NJpediaCX</h1>
        </div>
        <div class="w-full h-full flex justify-between items-center gap-4">
            <h1>Category</h1>
            <input class="input-style w-full" type="text" placeholder="Search...">
        </div>
        <div class="flex justify-center items-center gap-4">
            {{-- <i class="fas fa-shopping-cart text-2xl text-black"></i> --}}
            <div class="flex justify-center items-center gap-2">
                <a class="pr-4">
                    <x-bi-cart-fill />
                </a>
{{--                TODO: Create the auth for the login --}}
                <a href="/login">
                    <button class="border-[1px] border-green-600 px-4 py-1 rounded-md text-green-600">Login</button>
                </a>
                <a href="/register">
                    <button class="bg-green-600 px-4 py-1 border-[1px] border-green-600 rounded-md text-white font-semibold">Register</button>
                </a>
            </div>
        </div>
    </div>
</div>
