@extends('templates.form')

@section('title', 'Checkout')

@section('content')
    <div class="w-full flex border-b-[1px]">
        <a class="text-green-500 p-4 font-mandala text-3xl mx-auto relative" href="/"
           style="max-width: 1080px; min-width: 1024px">TokoNJedia</a>
    </div>
    <div class="mx-auto p-10 relative flex flex-col gap-4" style="max-width: 1080px; min-width: 1024px">
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
                <div class="flex flex-col gap-1">
                    <div class="font-bold text-lg"> {{ $cart->product->name }}</div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function chooseOtherLocation() {
            Livewire.emit('openModal', 'checkout-change-location-modal', { selected_location_id: $selected_location_id })
        }

        let $selected_location_id = '{{ $user->location[0]->id }}';

        window.onload = function () {
            $selected_location_id = '{{ $user->location[0]->id }}';
            document.getElementById('locCityCountry').innerHTML = '{{ $user->location[0]->city }}' + ', ' + '{{ $user->location[0]->country }}';
            document.getElementById('locAddressPostalCode').innerHTML = `{{ $user->location[0]->address}}` + ', ' + '{{ $user->location[0]->postal_code }}';
            document.getElementById('locNotes').innerHTML = '{{ $user->location[0]->notes }}';
        }

        function updateLocationDisplay(location) {
            $selected_location_id = location.id;
            document.getElementById('locCityCountry').innerHTML = location.city + ', ' + location.country;
            document.getElementById('locAddressPostalCode').innerHTML = location.address + ', ' + location.postal_code;
            document.getElementById('locNotes').innerHTML = location.notes;
        }

        Livewire.on('locationSelected', (location) => {
            console.log(location)
            $selected_location_id = location.id;
            document.getElementById('locCityCountry').innerHTML = location.city + ', ' + location.country;
            document.getElementById('locAddressPostalCode').innerHTML = location.address + ', ' + location.postal_code;
            document.getElementById('locNotes').innerHTML = location.notes;
        })
    </script>
    {{ $carts }}
@endsection
