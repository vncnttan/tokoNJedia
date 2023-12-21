@extends('templates.template')

@section('title', 'Cart')

@section('content')
    <div class="h-min-screen xl:px-80 lg:px-48 md:px-24 mt-6 mb-10 px-6 flex flex-col gap-5 w-full">
        <div class="w-full h-10 flex flex-row border-b-[1px] border-gray-400 border-opacity-30">
            <button
                id="product-button"
                class="flex flex-row gap-2 border-gray-400 text-gray-400  w-32 justify-center font-bold border-b-2"
                onclick="changeSelected('Product')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z"/>
                    <path fill-rule="evenodd"
                          d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.163 3.75A.75.75 0 0110 12h4a.75.75 0 010 1.5h-4a.75.75 0 01-.75-.75z"
                          clip-rule="evenodd"/>
                </svg>
                Product
            </button>
            <button
                id="store-button"
                class="flex flex-row gap-2 border-gray-400 text-gray-400 w-32 justify-center font-bold"
                onclick="changeSelected('Store')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path
                        d="M5.223 2.25c-.497 0-.974.198-1.325.55l-1.3 1.298A3.75 3.75 0 007.5 9.75c.627.47 1.406.75 2.25.75.844 0 1.624-.28 2.25-.75.626.47 1.406.75 2.25.75.844 0 1.623-.28 2.25-.75a3.75 3.75 0 004.902-5.652l-1.3-1.299a1.875 1.875 0 00-1.325-.549H5.223z"/>
                    <path fill-rule="evenodd"
                          d="M3 20.25v-8.755c1.42.674 3.08.673 4.5 0A5.234 5.234 0 009.75 12c.804 0 1.568-.182 2.25-.506a5.234 5.234 0 002.25.506c.804 0 1.567-.182 2.25-.506 1.42.674 3.08.675 4.5.001v8.755h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3zm3-6a.75.75 0 01.75-.75h3a.75.75 0 01.75.75v3a.75.75 0 01-.75.75h-3a.75.75 0 01-.75-.75v-3zm8.25-.75a.75.75 0 00-.75.75v5.25c0 .414.336.75.75.75h3a.75.75 0 00.75-.75v-5.25a.75.75 0 00-.75-.75h-3z"
                          clip-rule="evenodd"/>
                </svg>
                Shop
            </button>
        </div>

        <div id="product-result">
            @if(count($products) > 0)
                <div class="flex flex-col gap-3">
                    @if(count($stores) > 0)
                        <div class="w-full h-full rounded-lg shadow-card gap-10 flex flex-row p-4">
                            <a href="/merchant/{{ $stores[0]->id }}" class="h-fit flex-grow">
                                <div
                                    class="h-80 md:h-80 w-full flex flex-col p-2 justify-center place-items-center gap-5">
                                    <img src="{{$stores[0]->image ?? asset('/assets/logo/logo.png')}}"
                                         alt="{{ $stores[0]->name }}"
                                         class="rounded-full w-20 h-20 border-[1px] border-gray-300"/>

                                    <div class="flex flex-col gap-0.5 w-full place-items-center">
                                        <div class="text-xs text-gray-400 font-bold">
                                            Promoted by
                                        </div>
                                        <div>
                                            <div class="text-sm">
                                                {{ $stores[0]->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="font-bold text-lg px-12 text-center leading-5">
                                        Cheapest price only on {{ $stores[0]->name }}!
                                    </div>
                                    <button
                                        class="py-1 px-4 text-sm font-bold text-green-600 border-green-600 border-[1px] rounded-md">
                                        Check now
                                    </button>
                                </div>
                            </a>
                            <div class="sm:flex hidden flex-row flex-wrap gap-3">
                                <div class="2xl:flex flex-row flex-wrap gap-3 hidden">
                                    @foreach($stores[0]->products->slice(0, 2) as $product)
                                        <x-product-card
                                            :productId="$product->id"
                                            :productPromoId="getMaximumPromo($product->id)"
                                            :flashSalePromoId="getMaximumPromo($product->id)"
                                        />
                                    @endforeach
                                </div>
                                <a href="/merchant/{{ $stores[0]->id }}/products">
                                    <div
                                        class="w-36 h-80 md:w-48 md:h-80 rounded-md border-[1px] leading-4 border-gray-500 gap-2 px-6  border-opacity-50 flex flex-col justify-center place-items-center text-center font-bold text-green-600">
                                        <div
                                            class="rounded-full shadow-card p-2 border-black border-opacity-30 border-[1px]">
                                            <svg class=" w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                            </svg>
                                        </div>
                                        See other products
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="text-sm text-gray-700">
                        Showing {{count($products)}} from {{$productCount}} results for
                        <b>
                            "{{ $keyword }}"
                        </b>
                    </div>
                    <div class="justify-start w-fit place-items-start">
                        {{ $products->links() }}
                    </div>
                    <div class="flex flex-row flex-wrap gap-3">
                        @foreach($products as $product)
                            <x-product-card :productId="$product->id"/>
                        @endforeach
                    </div>


                </div>
            @else
                <div class="text-sm text-gray-700">
                    Searching for
                    <b>
                        "{{ $keyword }}"
                    </b>
                </div>
                @include('components.product.search-not-found-card')

            @endif
            <div class="mt-48">
                <x-recommended-product :request-count="12"/>
            </div>
        </div>
        <div id="store-result">
            @if(count($stores) > 0)
                <div class="flex flex-col gap-3">
                    <div class="text-sm text-gray-700">
                        Showing {{count($stores)}} results for
                        <b>
                            "{{ $keyword }}"
                        </b>
                    </div>
                    <div class="flex flex-row flex-wrap gap-3">
                        @foreach($stores as $store)
                            <x-merchant-card :merchantId="$store->id"/>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-sm text-gray-700">
                    Searching for
                    <b>
                        "{{ $keyword }}"
                    </b>
                </div>
                @include('components.product.search-not-found-card')
                <x-recommended-product :request-count="12"/>
            @endif
            <div class="mt-48">
                <x-recommended-product :request-count="12"/>
            </div>
        </div>

    </div>

    <script>
        let selected = "Product"

        function updateClasses(id, classes, operation) {
            const element = document.getElementById(id);
            classes.forEach(className => element.classList[operation](className));
        }

        function updateUI() {
            document.getElementById("product-result").hidden = selected !== "Product"
            document.getElementById("store-result").hidden = selected !== "Store"

            if (selected === "Product") {
                updateClasses("product-button", ["border-green-600", "text-green-600", "border-b-2"], "add");
                updateClasses("store-button", ["border-green-600", "text-green-600", "border-b-2"], "remove");
            } else {
                updateClasses("product-button", ["border-green-600", "text-green-600", "border-b-2"], "remove");
                updateClasses("store-button", ["border-green-600", "text-green-600", "border-b-2"], "add");
            }
        }

        function changeSelected(clicked) {
            selected = clicked

            updateUI()
        }

        window.onload = function () {
            updateUI()
        }
    </script>

@endsection
