@extends('templates.form')

@section('title', 'Checkout')

@section('content')
    <div class="w-full flex border-b-[1px]">
        <a class="text-green-500 p-4 font-mandala text-3xl mx-auto relative w-full" href="/"
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
                    <div class="flex flex-col md:gap-5 md:flex-row">

                        <div class="flex flex-col gap-3 py-4 flex-grow">
                            <div class="flex flex-col">
                                <div class="font-bold text-base"> {{ $cart->product->merchant->name }}</div>
                                <div
                                    class="text-sm text-gray-600"> {{ $cart->product->merchant->location[0]->city }}</div>
                            </div>
                            <div class="flex flex-row gap-4">
                                <img src="{{ $cart->product->productImages[0]->image }}"
                                     class="w-16 h-16 object-cover rounded-md"
                                     alt="{{ $cart->product->name }} Image">
                                <div class="flex flex-col">
                                    <div class="text-base">{{ $cart->product->name }}</div>
                                    <div class="text-sm text-gray-600"> {{ $cart->quantity }} item</div>
                                    <div class="font-bold text-lg">
                                        Rp {{ formatPrice($cart->promoInformation->discountedPrice) }}
                                    </div>
                                    <div class="flex gap-1">
                                        <span class="line-through text-gray-400 text-xs">
                                            Rp {{ formatPrice($cart->productVariant->price) }}
                                        </span>
                                        <span class="text-xs text-red-500 font-bold">{{ $cart->promoInformation->discount }}%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center place-items-start w-72 gap-1">
                            <label for="duration" class="font-bold text-sm">
                                Choose Duration
                            </label>
                            <select id="duration"
                                    class="durationSelect border-r-8 bg-green-600 w-full border border-green-600 text-white font-semibold text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-2 px-2.5"
                                    data-cart-id="{{ $cart->product->id }}"
                                    data-merchant-lat="{{ $cart->product->merchant->location[0]->latitude }}"
                                    data-merchant-long="{{$cart->product->merchant->location[0]->longitude}}"
                                    data-variant-id="{{ $cart->productVariant->id }}"
                                    data-product-id="{{ $cart->product->id }}"
                                    data-merchant-id="{{ $cart->product->merchant->id }}">

                                <option class="bg-white text-black text-center" disabled selected>Shipping</option>
                                @foreach($shipment as $s)
                                    <option class="bg-white text-black" value="{{ $s->id }}"
                                            data-shipment-name="{{ $s->name }}"
                                            data-base-price="{{$s->base_price}}"
                                            data-variable-price="{{ $s->variable_price }}">
                                        {{ $s->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="flex flex-row justify-between mt-2 w-full">
                                <div id="shipmentNameDisplay{{$cart->product->id}}"
                                     class="font-semibold text-sm text-black"></div>
                                <div id="shipmentPriceDisplay{{$cart->product->id}}"
                                     class="font text-sm text-gray-500"></div>
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
                <div class="flex flex-row justify-between">
                    <span id="totalShipmentProductCount">a</span>
                    <span id="totalShipmentProduct">a</span>
                </div>
                <div
                    class="border-t-[1px] border-gray-500 border-opacity-20 py-3 flex flex-row justify-between font-bold text-lg">
                    <span>Shopping Total</span>
                    <span id="totalDisplay"></span>
                </div>

                <div class="text-gray-500 text-sm">
                    By purchasing products from tokoNJedia, I agree to the
                    <a href="https://www.tokopedia.com/terms" class="text-green-500">terms and conditions</a>
                </div>

                <button class="bg-green-600 py-2 text-white font-bold rounded-md" onclick="proceedTransaction()">
                    Proceed Transaction
                </button>
            </div>
        </div>
    </div>
    <div class="w-full flex border-t-[1px] border-gray-400">
        <div
            class="text-gray-800 p-4 w-full mx-auto relative flex flex-row gap-2 justify-start place-items-center text-opacity-50 font-bold"
            style="max-width: 1080px;">
            <img src="{{ asset('assets/logo/ic-toped.jpg') }}" alt="Checkout Footer" class="h-12 w-12"/>
            © 2009 - 2023
        </div>
    </div>
    <script>
        let user_id = "{{ $user->id }}";

        function proceedTransaction() {
            let data = {
                location_id: $selected_location.id,
                user_id: user_id,
                shipment_ids: cartSelections,
                _token: "{{ csrf_token() }}"
            };

            fetch('/transaction', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(text);
                        });
                    }
                    return response.json();
                })
                .then((response) => {
                    if (response.message) {
                        console.log('Success adding to transaction');
                        location.href = '/profile/transaction';
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    location.reload();
                });
        }

        function updateSubtotal() {
            let subtotal = 0;
            let count = 0;
            @foreach($carts as $cart)
                subtotal += {{ ceil($cart->promoInformation->discountedPrice) }} * {{ $cart->quantity }};
                count += 1;
            @endforeach

            document.getElementById('subtotalDisplay').innerHTML = 'Rp' + formatPriceJS(subtotal.toString());
            document.getElementById('totalDisplayProduct').innerHTML = 'Rp' + formatPriceJS(subtotal.toString());
            document.getElementById('totalDisplayProductCount').innerHTML = 'Total Price (' + count.toString() + ' Product)';

            let cartTotal = 0;
            let selectedCart = 0
            Object.values(cartSelections).forEach((cartSelection) => {
                cartTotal += cartSelection.shipmentPrice;
                if (cartSelection.shipmentPrice > 0) {
                    selectedCart += 1;
                }
            });

            document.getElementById("totalShipmentProductCount").innerHTML = 'Shipping (' + selectedCart.toString() + ' Product)';
            document.getElementById("totalShipmentProduct").innerHTML = 'Rp' + formatPriceJS(cartTotal.toString());

            document.getElementById('totalDisplay').innerHTML = 'Rp' + formatPriceJS((subtotal + cartTotal).toString());
        }

        function formatPriceJS(price) {
            return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
        }

        {{--        Script to deal with changing location chosen--}}
            window.chooseOtherLocation = function () {
            Livewire.emit('openModal', 'checkout-change-location-modal', {selected_location_id: $selected_location.id})
        }

        let $selected_location = {!! json_encode($user->location[0]->toArray()) !!};

        window.onload = function () {
            initializeCartSelections();
            updateLocationDisplay($selected_location);
            updateSubtotal()
            setupEventListeners();
        }

        function updateLocationDisplay(location) {
            $selected_location = location;
            updateSubtotal()
            document.getElementById('locCityCountry').innerHTML = location.city + ', ' + location.country;
            document.getElementById('locAddressPostalCode').innerHTML = location.address + ', ' + location.postal_code;
            document.getElementById('locNotes').innerHTML = location.notes;
        }

        Livewire.on('locationSelected', (location) => {
            updateLocationDisplay(location)
            updateSubtotal()
            Array.from(document.getElementsByClassName('durationSelect')).forEach((select, index) => {
                updateShipmentPriceDisplay(select);
            });
        })

        let cartSelections = {};

        function initializeCartSelections() {
            @foreach($carts as $cart)
                cartSelections['{{ $cart->product->id }}'] = {
                shipmentId: '',
                shipmentPrice: 0
            };
            @endforeach
        }

        function setupEventListeners() {
            Array.from(document.getElementsByClassName('durationSelect')).forEach((select, index) => {
                select.onchange = updateShipmentPriceDisplay.bind(null, select);
            });
        }

        function updateShipmentPriceDisplay(select) {
            let cartId = select.getAttribute('data-cart-id');
            let merchantLat = select.getAttribute('data-merchant-lat');
            let merchantLong = select.getAttribute('data-merchant-long');
            let variantId = select.getAttribute('data-variant-id');
            let productId = select.getAttribute('data-product-id');
            let merchantId = select.getAttribute('data-merchant-id');

            let selectedOption = select.options[select.selectedIndex];

            let shipmentBasePrice = parseInt(selectedOption.getAttribute('data-base-price'));
            let shipmentVariablePrice = parseInt(selectedOption.getAttribute('data-variable-price'));

            if (!shipmentBasePrice || !shipmentVariablePrice) {
                return;
            }
            let userLatitude = $selected_location.latitude;
            let userLongitude = $selected_location.longitude;

            let shipmentPrice = calculatePrice(userLatitude, userLongitude, parseFloat(merchantLat), parseFloat(merchantLong), shipmentBasePrice, shipmentVariablePrice);

            let shipmentName = selectedOption.getAttribute('data-shipment-name');
            let shipmentPriceDisplay = document.getElementById('shipmentPriceDisplay' + cartId);
            let shipmentNameDisplay = document.getElementById('shipmentNameDisplay' + cartId);
            shipmentPriceDisplay.innerHTML = 'Rp. ' + formatPriceJS(shipmentPrice.toString())
            shipmentNameDisplay.innerHTML = shipmentName

            cartSelections[cartId].shipmentId = selectedOption.value;
            cartSelections[cartId].productId = cartId;
            cartSelections[cartId].variantId = variantId;
            cartSelections[cartId].shipmentPrice = shipmentPrice;
            cartSelections[cartId].productId = productId;
            cartSelections[cartId].merchantId = merchantId;
            updateSubtotal()
        }

        function calculatePrice(latitudeFrom, longitudeFrom, latitudeTo, longitudeTo, basePrice, variablePrice) {
            const deg2rad = deg => deg * (Math.PI / 180);

            let latFrom = deg2rad(latitudeFrom);
            let lonFrom = deg2rad(longitudeFrom);
            let latTo = deg2rad(latitudeTo);
            let lonTo = deg2rad(longitudeTo);

            let latDelta = latTo - latFrom;
            let lonDelta = lonTo - lonFrom;

            let angle = 2 * Math.asin(Math.sqrt(Math.pow(Math.sin(latDelta / 2), 2) +
                Math.cos(latFrom) * Math.cos(latTo) * Math.pow(Math.sin(lonDelta / 2), 2)));

            let distance = angle * 6371;
            let numericalBasePrice = parseFloat(basePrice);
            let numericalVariablePrice = parseFloat(variablePrice);

            return Math.floor(numericalBasePrice + (distance / 1000) * numericalVariablePrice);
        }
    </script>
@endsection
