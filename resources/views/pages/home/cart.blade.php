@extends('templates.template')

@section('title', 'Cart')

@section('content')
    <div class="min-h-screen flex flex-row justify-center gap-8 w-full py-10">
        <div class="w-2/5 flex flex-col gap-4">
            <div class="font-bold text-2xl">
                Cart
            </div>
            <div class="bg-gray-100 bg-opacity-90 h-1.5 w-full rounded-md"></div>
            @foreach($carts as $cart)
                <div class="px-10 flex flex-col gap-5">
                    <div class="flex flex-col">
                        {{--                         Store--}}
                        <div class="text-lg font-bold">
                            {{$cart->product->merchant->name}}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{$cart->product->merchant->location[0]->city}}
                        </div>
                    </div>

                    <div class="flex flex-row text-lg gap-3">
                        <img src="{{$cart->product->image}}" alt="Product Image"
                             class="w-20 h-20 object-cover rounded-md">
                        <div class="flex flex-col text-base gap-1">
                            <div>
                                {{ $cart->product->name }}
                            </div>
                            <div class="font-bold">
                                Rp{{ formatPrice($cart->product->price) }}
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row justify-end gap-16 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>

                        <div class="flex flex-row gap-5 border-b-[1px] border-gray-500 border-opacity-10">
                            <button onclick="changeQuantity({{ $cart->id }}, 'add')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="w-6 h-6 disabled:text-gray-700 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>
                            <span id="quantity-{{ $cart->id }}">
                                {{ $cart->quantity }}
                            </span>
                            <button onclick="changeQuantity({{ $cart->id }}, 'subtract')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" class="w-6 h-6 disabled:text-gray-700 text-green-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </button>

                            <script>
                                function addQuantity() {

                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-100 bg-opacity-90 h-1.5 w-full rounded-md"></div>
            @endforeach
        </div>
        <div class="h-[80vh] relative">
            <div class="sticky h-fit right-0 w-80 top-[140px] flex flex-col gap-5 float-left">
                <div class="rounded-xl border-gray-300 border-[1px] p-4 flex flex-col gap-2">
                    <h1 class="font-bold text-base">Shopping Summary</h1>
                    <div class="text-gray-500 text-base place-items-end flex flex-row justify-between">
                        Total Price (item)
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeQuantity(cartId, action) {
            const quantityElement = document.getElementById('quantity-' + cartId);
            let currentQuantity = parseInt(quantityElement.innerText);

            if (action === 'add') {
                currentQuantity++;
            } else if (action === 'subtract' && currentQuantity > 1) {
                currentQuantity--;
            }

            quantityElement.innerText = currentQuantity.toString();

            updateQuantityOnServer(cartId, currentQuantity);
        }


        function updateQuantityOnServer(cartId, newQuantity) {
            const data = {
                cartId: cartId,
                newQuantity: newQuantity
            }
            fetch('/cart', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(() => {
                    console.log("Success updating quantity")
                })
                .catch((error) => {
                    console.error('Error:', error);
                })
        }
    </script>
@endsection
