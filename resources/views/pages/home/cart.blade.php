@extends('templates.template')

@section('title', 'Cart')

@section('content')
    <div class="md:min-h-screen justify-center flex-grow flex flex-col w-full py-10 px-8 place-items-center">
        <div class="flex md:flex-row flex-col gap-8 w-full justify-center">
            <div class="md:w-3/5 lg:w-1/2 flex flex-col gap-4">
                @if(count($carts) >= 1)
                    <div class="font-bold text-2xl">
                        Cart
                    </div>
                    <div class="bg-gray-100 bg-opacity-90 h-1.5 w-full rounded-md"></div>
                @endif
                @foreach($carts as $cart)
                    <div class="px-10 flex flex-col gap-5">
                        <a href="/merchant/{{ $cart->product->merchant->id }}" class="flex flex-col">
                            {{--                         Store--}}
                            <div class="text-lg font-bold">
                                {{$cart->product->merchant->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{$cart->product->merchant->location[0]->city}}
                            </div>
                        </a>


                        <a href="/product-detail/{{ $cart->product_id }}">
                            <div class="flex flex-row text-lg gap-3">
                                <img src="{{$cart->product->productImages[0]->image}}" alt="Product Image"
                                     class="w-20 h-20 object-cover rounded-md">
                                <div class="flex flex-col text-base gap-1">
                                    <div>
                                        {{ $cart->product->name }}
                                    </div>

                                    @if ($cart->promoInformation->promoName != null)
                                        <div class="font-bold">
                                            Rp{{ formatPrice($cart->promoInformation->discountedPrice) }}
                                        </div>
                                        <div class="flex gap-1">
                                        <span class="line-through text-gray-400 text-xs">
                                            Rp{{ formatPrice($cart->productVariant->price) }}
                                        </span>
                                            <span class="text-xs text-red-500 font-bold">{{ $cart->promoInformation->discount }}%</span>
                                        </div>
                                    @else
                                        <div class="font-bold">
                                            Rp{{ formatPrice($cart->productVariant->price) }}
                                        </div>
                                    @endif

                                    {{--                                    {{ $cart->promoInformation }}--}}
                                </div>
                            </div>
                        </a>
                        <div class="flex flex-row justify-end gap-16 text-gray-500">
                            <button onclick="deleteItem('{{ $cart->product->id}}')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                </svg>
                            </button>

                            <div class="flex flex-row gap-5 border-b-[1px] border-gray-500 border-opacity-10">
                                <button
                                    {{ $cart->quantity <= 1 ? 'disabled' : '' }} onclick="changeQuantity('{{ $cart->product_id }}', 'subtract', this, {{ $cart->productVariant->stock }})"
                                    class="disabled:text-gray-700 text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                                <span id="quantity-{{ $cart->product_id }}">
                                {{ $cart->quantity }}
                            </span>
                                <button
                                    {{ $cart->quantity >= $cart->productVariant->stock ? 'disabled' : '' }} class="disabled:text-gray-700 text-green-600"
                                    onclick="changeQuantity('{{ $cart->product_id }}', 'add', this, {{ $cart->productVariant->stock }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-100 bg-opacity-90 h-1.5 w-full rounded-md"></div>
                @endforeach

                @if(count($carts) < 1)
                    <div class="w-full justify-center flex flex-col place-items-center gap-2">
                        <img alt='Empty Cart' src="{{ url(asset('/assets/checkout/cart.jpg')) }}" class="h-32">
                        <div class="flex flex-col gap-1 place-items-center">
                            <h1 class="text-2xl font-bold ">
                                Your Cart is Empty
                            </h1>
                            <h5 class="text-base text-gray-700">
                                Make your dream come true now!
                            </h5>
                        </div>

                        <a href="/">
                            <button class="bg-green-600 py-2 px-16 rounded-md text-white font-bold">
                                Shop Now
                            </button>
                        </a>
                    </div>
                @endif
            </div>
            @if(count($carts) >= 1)
                <div class="relative">
                    <div class="sticky h-fit right-0 w-80 top-[140px] flex flex-col gap-5 float-left">
                        <div class="rounded-xl border-gray-300 border-[1px] p-4 flex flex-col gap-2">
                            <h1 class="font-bold text-base">Shopping Summary</h1>
                            <div
                                class="text-gray-500 text-base place-items-end flex flex-row justify-between py-2 border-b-[1px] border-gray-200">
                                <div>
                                    Total Price (item)
                                </div>
                                <span id="totalPriceDisplay"></span>
                            </div>
                            <div class="text-lg font-bold place-items-end flex flex-row justify-between py-2">
                                <div>
                                    Grand Total
                                </div>
                                <span id="grandTotalPriceDisplay"></span>
                            </div>
                            <a href="/cart/shipment"
                               class="bg-green-600 hover:bg-green-700 py-2 text-white font-bold rounded-md justify-center text-center">
                                <button>
                                    Buy
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="md:block hidden my-16 w-fit md:w-4/5 lg:w-5/6">
            <x-recommended-product :request-count="14"/>
        </div>
    </div>


    <script>
        function formatPriceJS(price) {
            return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
        }

        function updateSummary() {
            if (carts.length > 0) {
                let totalPrice = 0;

                carts.forEach(cart => {
                    totalPrice += cart.promoInformation.discountedPrice * cart.quantity;
                });

                totalPrice = Math.ceil(totalPrice);
                document.getElementById('totalPriceDisplay').innerText = 'Rp' + formatPriceJS(totalPrice.toString());
                document.getElementById('grandTotalPriceDisplay').innerText = 'Rp' + formatPriceJS(totalPrice.toString());
            }
        }

        function deleteItem(productId) {
            const data = {
                product_id: productId,
                _token: "{{ csrf_token() }}"
            }
            fetch('/cart', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then((data) => {
                    carts = data;
                    location.reload()
                    updateSummary()
                })
                .catch((error) => {
                    console.error('Error:', error);
                })
        }

        function changeQuantity(cartId, action, element, stock) {
            const quantityElement = document.getElementById('quantity-' + cartId);
            let currentQuantity = parseInt(quantityElement.innerText);

            if (action === 'add') {
                currentQuantity++;

                if (currentQuantity > 1) {
                    element.previousElementSibling.previousElementSibling.disabled = false;
                }
                if (currentQuantity >= stock) {
                    element.disabled = true;
                }
            } else if (action === 'subtract' && currentQuantity > 1) {
                currentQuantity--;

                if (currentQuantity <= 1) {
                    element.disabled = true;
                }
                if (currentQuantity < stock) {
                    element.nextElementSibling.nextElementSibling.disabled = false;
                }
            }

            quantityElement.innerText = currentQuantity.toString();
            updateQuantityOnServer(cartId, currentQuantity);
        }


        function updateQuantityOnServer(productId, newQuantity) {
            const data = {
                product_id: productId,
                quantity: newQuantity,
                _token: "{{ csrf_token() }}"
            }
            fetch('/cart', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then((data) => {
                    carts = data;
                    updateSummary()
                })
                .catch((error) => {
                    console.error('Error:', error);
                })
        }

        let carts = {!! json_encode($carts->toArray()) !!};
        window.onload = function () {
            updateSummary()
        }
    </script>
@endsection
