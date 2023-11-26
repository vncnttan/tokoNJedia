@extends('templates.form')

@section('title', 'Checkout')

@section('content')
    <div class="w-full flex border-b-[1px]">
        <a class="text-green-500 p-4 font-mandala text-3xl mx-auto relative md:min-w-[1024px]" href="/"
           style="max-width: 1080px;">TokoNJedia</a>
    </div>
    <div class="flex flex-col md:flex-row gap-12 mx-auto px-4 py-10 md:min-w-[1024px]" style="max-width: 1080px;">
        <div class="relative flex flex-col gap-4 flex-grow">
            <div class="font-bold text-xl">
                Checkout
            </div>
            <div class="font-bold text-sm ">
                Shipping Address
            </div>
            <div class="flex flex-col py-2 border-b-[1px] border-t-[1px] border-gray-200 border-opacity-50">
                <div id="locUsername" class="font-bold">
                    {{ $user->username }}
                </div>
                <div id="locCityCountry"></div>
                <div id="locAddressPostalCode" class="text-gray-500 text-sm"></div>
                <div id="locNotes" class="text-gray-500 text-sm"></div>
            </div>
            <div>
                <button
                    class="font-semibold text-gray-600 border-[1px] border-gray-500 border-opacity-30 p-2 px-4 rounded-lg"
                    onclick="chooseOtherLocation()">
                    Choose other address
                </button>
            </div>

            <div class="flex flex-col border-t-4 border-gray-300">
                @foreach($carts as $cart)
                    <div class="flex flex-col gap-3 py-4">
                        <div class="flex flex-col">
                            <div class="font-bold text-base"> {{ $cart->product->merchant->name }}</div>
                            <div class="text-sm text-gray-600"> {{ $cart->product->merchant->location[0]->city }}</div>
                        </div>
                        <div class="flex flex-row gap-4">
                            <img src="{{ $cart->product->productImages[0]->image }}"
                                 class="w-16 h-16 object-cover rounded-md"
                                 alt="{{ $cart->product->name }} Image">
                            <div class="flex flex-col">
                                <div class="text-base">{{ $cart->product->name }}</div>
                                <div class="text-sm text-gray-600"> {{ $cart->quantity }} item</div>
                                <div class="text-lg font-bold"> Rp{{ formatPrice($cart->productVariant->price) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="border-t-[1px] border-gray-500 border-opacity-30 py-2 flex flex-row justify-between font-bold">
                <div>
                    Subtotal
                </div>
                <span id="subtotalDisplay"></span>
            </div>

        </div>

        <div class="md:w-96 w-full h-fit shadow-card mt-12 flex flex-col gap-4 rounded-md">
            <div class="p-5 flex flex-col gap-4">
                <div class="font-bold">
                    Shopping Summary
                </div>
                <div class="flex flex-row justify-between">
                    <span id="totalDisplayProductCount"></span>
                    <span id="totalDisplayProduct"></span>
                </div>
                <div class="border-t-[1px] border-gray-500 border-opacity-20 py-3 flex flex-row justify-between font-bold text-lg">
                    <span>Shopping Total</span>
                    <span id="totalDisplay"></span>
                </div>

                <div class="text-gray-500 text-sm">
                    By purchasing products from tokoNJedia, I agree to the
                    <a href="https://www.tokopedia.com/terms" class="text-green-500">terms and conditions</a>
                </div>

                <button class="bg-green-600 py-2 text-white font-bold rounded-md">
                    Proceed Transaction
                </button>
            </div>
        </div>
    </div>
    <div class="w-full flex border-t-[1px] border-gray-400">
        <div
            class="text-gray-800 p-4 mx-auto relative flex flex-row gap-2 justify-start place-items-center text-opacity-50 font-bold"
            style="max-width: 1080px; min-width: 1024px">
            <img src="{{ asset('assets/logo/ic-toped.jpg') }}" alt="Checkout Footer" class="h-12 w-12"/>
            © 2009 - 2023
        </div>
    </div>

    <script>
        function updateSubtotal() {
            let subtotal = 0;
            let count = 0;
            @foreach($carts as $cart)
                subtotal += {{ $cart->productVariant->price }} * {{ $cart->quantity }};
                count += 1;
            @endforeach
            console.log(subtotal)
            document.getElementById('subtotalDisplay').innerHTML = 'Rp' + formatPriceJS(subtotal.toString());
            document.getElementById('totalDisplay').innerHTML = 'Rp' + formatPriceJS(subtotal.toString());
            document.getElementById('totalDisplayProduct').innerHTML = 'Rp' + formatPriceJS(subtotal.toString());
            document.getElementById('totalDisplayProductCount').innerHTML = 'Total Price (' + count.toString() + ' Product)';
        }

        function formatPriceJS(price) {
            return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
        }

    </script>


    <script>
        {{--        Script to deal with changing location chosen--}}
        function chooseOtherLocation() {
            Livewire.emit('openModal', 'checkout-change-location-modal', {selected_location_id: $selected_location.id})
        }

        let $selected_location = {!! json_encode($user->location[0]->toArray()) !!};

        console.log($selected_location)
        window.onload = function () {
            updateLocationDisplay($selected_location);
            updateSubtotal()
        }

        function updateLocationDisplay(location) {
            $selected_location = location;
            document.getElementById('locCityCountry').innerHTML = location.city + ', ' + location.country;
            document.getElementById('locAddressPostalCode').innerHTML = location.address + ', ' + location.postal_code;
            document.getElementById('locNotes').innerHTML = location.notes;
        }

        Livewire.on('locationSelected', (location) => {
            updateLocationDisplay(location)
        })
    </script>
@endsection