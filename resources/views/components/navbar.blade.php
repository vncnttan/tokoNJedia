<div class="relative h-28 w-full z-[20]">
    <div class="fixed top-0 left-0 right-0 h-28 bg-white border-b-2 border-solid border-gray-100 ">
        <div class="w-full bg-gray-100 py-1 text-sm md:px-12 px-6 text-gray-600 box-border">
            <div class="flex flex-row justify-between place-items-center">
                <div class="flex flex-row place-items-center gap-2 whitespace-nowrap">
                    <svg style="fill: #999999" xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 384 512">
                        <path
                            d="M16 64C16 28.7 44.7 0 80 0H304c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H80c-35.3 0-64-28.7-64-64V64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64H80V384H304V64z"/>
                    </svg>
                    Download Tokonjedia App
                </div>

                <div class="flex-row flex lg:gap-8 gap-4 text-xs invisible md:visible">
                    <a class="hover:text-green-600" href="https://www.tokopedia.com/about/" target="_blank">
                        <button class="whitespace-nowrap overflow-ellipsis">
                            Tentang Tokonjedia
                        </button>
                    </a>
                    <a class="hover:text-green-600" href="https://www.tokopedia.com/mitra" target="_blank">
                        <button class="whitespace-nowrap overflow-ellipsis">
                            Mitra Tokonjedia
                        </button>
                    </a>
                    <a href="merchant/create" class="hover:text-green-600">
                        <button class="whitespace-nowrap overflow-ellipsis">
                            Mulai Berjualan
                        </button>
                    </a>
                    <a class="hover:text-green-600" href="https://www.tokopedia.com/discovery/deals" target="_blank">
                        <button class="whitespace-nowrap overflow-ellipsis">
                            Promo
                        </button>
                    </a>
                    <a class="hover:text-green-600" href="https://www.tokopedia.com/help/" target="_blank">
                        <button class="whitespace-nowrap overflow-ellipsis">
                            TokoNJedia Care
                        </button>
                    </a>

                </div>
            </div>
        </div>
        <div class="w-full h-fit box-border flex flex-col justify-center lg:px-12 px-6 py-2">
            <div class="w-full h-full flex justify-between items-center lg:gap-8 gap-2">
                <div class="h-full flex justify-center items-center">
                    @if($merchantPage)
                        <div class="flex flex-row gap-2 place-items-end">
                            <a class="text-green-500 font-semibold font-mandala text-3xl"
                               href="/merchant">TokoNJedia</a> Seller
                        </div>
                    @else
                        <a class="text-green-500 font-semibold font-mandala text-3xl" href="/">TokoNJedia</a>
                    @endif
                </div>
                <div class="w-full h-full hidden md:flex justify-between items-center gap-4">
{{--                    <a class="nav-button">Category</a>--}}
                    <form id="searchForm" class="h-full w-full" onsubmit="e.preventDefault()">
                        <label class="h-full w-full">
                            <input class="bg-white input-style w-full" type="text" id="search" placeholder="Search...">
                        </label>
                    </form>
                </div>
                <div class="h-full hidden md:flex justify-center items-center lg:gap-4 gap-2">
                    @auth
                        @if(!$merchantPage)
                            <div class="h-full flex justify-center items-center  gap-2">
                                <a class="nav-button relative" href="/cart">
                                    @if($cartCount > 0)
                                        <div
                                            class="rounded-full text-xs bg-red-500 w-4 h-4 text-white font-bold absolute top-0 right-0 flex justify-center place-items-center">
                                            {{ $cartCount }}
                                        </div>
                                    @endif
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" fill="#ffffff"
                                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                                    </svg>
                                </a>
                                <a class="nav-button" href="/chat">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" fill="#ffffff"
                                              d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"/>
                                    </svg>

                                </a>
                            </div>
                        @endif
                    @endauth
                    <div class="border-r-[1px] border-gray-400 h-8 opacity-30"></div>
                    @auth
                        <a class="w-36 flex justify-start items-center gap-2 nav-button" href="/merchant"
                           target="_blank">
                            <div class="w-8 h-8 rounded-full overflow-hidden flex justify-center items-center ">
                                @if($merchant)
                                    <img class="w-full h-full rounded-full object-cover object-center"
                                         src="{{ $merchant->image ?? asset('assets/logo/logo.png') }}"
                                         alt="">
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z"/>
                                    </svg>
                                @endif
                            </div>
                            <h1 class="text-md text-black whitespace-nowrap overflow-hidden max-w-full">{{ $merchant->name ?? "Merchant" }}</h1>
                        </a>
                        <a class="max-w-36 px-2 flex justify-start items-center gap-2 nav-button" href="/profile">
                            <div
                                class="w-8 h-8 rounded-full overflow-hidden flex justify-center items-center bg-gray-50">
                                <img class="w-full h-full rounded-full object-cover object-center self-center"
                                     src="{{ url(asset(Auth::user()->image)) }}"
                                     alt="">
                            </div>
                            <h1 class="text-md text-black whitespace-nowrap overflow-hidden max-w-full">{{ Auth::user()->username }}</h1>
                        </a>
                    @endauth
                    @guest
                        <a href="/login">
                            <button class="border-[1px] border-green-600 px-4 py-1 rounded-md text-green-600">Login
                            </button>
                        </a>
                        <a href="/register">
                            <button
                                class="bg-green-600 px-4 py-1 border-[1px] border-green-600 rounded-md text-white font-semibold">
                                Register
                            </button>
                        </a>
                    @endguest
                </div>
            </div>
            <div
                class="w-full py-1 h-full xl:pl-72 lg:px-12 hidden md:flex text-gray-500 lg:text-sm text-xs flex-row gap-4">
                @foreach($product_names as $product_name)
                    <div class="hover:text-green-600 overflow-hidden space-x-0.5 h-5">
                        <a href="/search-page/{{ $product_name }}">
                            {{ $product_name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.getElementById('searchForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const userInput = document.getElementById('search').value;
            window.location.href = '/search-page/' + userInput;
        });
    </script>
</div>
