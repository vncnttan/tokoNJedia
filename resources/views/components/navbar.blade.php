<div class="relative h-20 w-full z-20">
        <div class="fixed top-0 left-0 right-0 bg-white border-b-2 border-solid border-gray-500">
        <div class="w-full h-20 flex justify-between items-center gap-8 p-6 box-border">
            <div class="h-full flex justify-center items-center">
                <a class="text-green-500 font-semibold font-mandala text-2xl" href="/">NJpediaCX</a>
            </div>
            <div class="w-full h-full flex justify-between items-center gap-4">
                <a class="nav-button">Category</a>
                <input class="input-style w-full" type="text" placeholder="Search...">
            </div>
            <div class="h-full flex justify-center items-center gap-4">
                <div class="h-full flex justify-center items-center  gap-4">
                    <a class="nav-button " href="/cart">
                        <x-bi-cart class="icon-size" />
                    </a>
                    @auth
                        <a class="nav-button" href="/chat">
                            <x-bi-chat-dots class="icon-size" />
                        </a>
                    @endauth
                </div>
                <div class="border-r-2 border-gray-400 h-full"></div>

                @auth
                    <a class="flex justify-center items-center gap-2 nav-button" href="/profile">
                        <div class="w-10 h-10 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{ Auth::user()->image }}"
                                alt="">
                        </div>
                        <h1 class="text-base text-black">{{ Auth::user()->email }}</h1>
                    </a>
                @endauth

                @guest
                    <a href="/login">
                        <button class="border-[1px] border-green-600 px-4 py-1 rounded-md text-green-600">Login</button>
                    </a>
                    <a href="/register">
                        <button
                            class="bg-green-600 px-4 py-1 border-[1px] border-green-600 rounded-md text-white font-semibold">Register</button>
                    </a>
                @endguest
            </div>
        </div>
    </div>
</div>
