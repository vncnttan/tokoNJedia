@extends('templates.template')

@section('title', 'Merchant')

@section('content')
    <div
        class="max-w-7xl w-screen h-screen flex-1 flex flex-col lg:flex-row justify-start md:justify-evenly place-items-center gap-4 lg:gap-16 p-4 sm:px-6 lg:px-8">
        <div class="flex-grow w-full lg:w-1/2 lg:h-[70vh] hidden md:flex justify-center place-items-center">
            <div class="h-full w-full flex flex-row lg:flex-col justify-center items-start gap-8 text-md p-4">
                <div class="w-full flex justify-start items-center gap-2 lg:gap-8">
                    <img src="{{ url(asset('assets/merchants/free-benefit.png')) }}" alt="">
                    <p>Open a merchant Account <b>free</b> without any charges.</p>
                </div>
                <div class="w-full flex justify-start items-center gap-2 lg:gap-8">
                    <img src="{{ url(asset('assets/merchants/reach-benefit.png')) }}" alt="">
                    <p>More than <b>90 millions</b> active users every month.</p>
                </div>
                <div class="w-full flex justify-start items-center gap-2 lg:gap-8">
                    <img src="{{ url(asset('assets/merchants/user-benefit.png')) }}" alt="">
                    <p><b>Reach 97%</b> potential user across Indonesia</p>
                </div>
            </div>
        </div>
        <h1 class="font-bold text-xl block sm:hidden mt-8 mb-4">
            Merchant Register
        </h1>
        <div class="flex-grow w-full rounded-lg bg-white ring-gray-200 ring-1 p-4 sm:p-8 box-border">
            <div class="w-full h-full flex flex-col justify-center gap-8">
                <p class="text-black text-xl font-semibold">Hello, {{ Auth::user()->username }} lets fill in your
                    merchant detail</p>
                <form id="registrationForm" class="w-full flex flex-col justify-center items-start gap-12" method="POST"
                      action="/merchant">
                    @csrf
                    <div class="w-full flex gap-4 sm:gap-6">
                        <h1 id="progress-indicator1"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            1
                        </h1>
                        <div class="flex-grow flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Phone Number</h1>
                            <div class="flex flex-col gap-2" id="form-content1">
                                <div class="flex flex-col">
                                    <label for="phoneNumberInput" class="font-semibold text-gray-500">Phone
                                        Number
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="phoneNumberInput" class="input-style pl-4" type="number" name="phone"
                                           value="{{ old('phone') }}" placeholder="08XXXXXXX"
                                           oninput="updateBtnNext1()">
                                    <p class="text-gray-500">Make sure your phone number is active to speed up the
                                        registration process</p>
                                </div>
                                <button id="button-progress-1"
                                        class="w-fit py-2 px-12 bg-gray-100 text-gray-400 rounded-md"
                                        onclick="updateProgress(event, 1)" disabled>
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex gap-2 sm:gap-6">
                        <h1 id="progress-indicator2"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            2
                        </h1>
                        <div class="flex-grow flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Merchant Name</h1>
                            <div id="form-content2" class="hidden flex flex-col gap-2">
                                <div class="flex flex-col">
                                    <label for="nameInput" class="font-semibold text-gray-500">Merchant Name
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <input id="nameInput" class="input-style pl-2" type="text" name="name"
                                           value="{{ old('name') }}" oninput="updateBtnNext2()"
                                           placeholder="ABC Store">
                                    <p class="text-gray-500">Merchant name will be displayed on your products</p>
                                </div>

                                <div class="flex flex-row gap-2">
                                    <button class="w-fit py-2 px-12 bg-gray-200 text-black rounded-md"
                                            onclick="updateProgress(event, -1)">
                                        Back
                                    </button>
                                    <button id="button-progress-2"
                                            class="w-fit py-2 px-12 bg-gray-100 text-gray-400 rounded-md"
                                            onclick="updateProgress(event, 1)" disabled>
                                        Next
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="w-full flex gap-2 sm:gap-6">
                        <h1 id="progress-indicator3"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            3
                        </h1>
                        <div class="flex-grow flex flex-col gap-4 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Location</h1>
                            <div class="flex flex-col gap-8 hidden" id="form-content3">
                                <div class="flex flex-col gap-2">
                                    <div class="flex flex-row gap-5 text-gray-500 font-semibold">
                                        <label id="latitudeText" for="lat">
                                        </label>
                                        <input hidden name="lat" id="lat" value="0"/>
                                        <label id="longitudeText" for="long">
                                        </label>
                                        <input hidden name="long" id="long" value="0"/>
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="cityInput" class="font-semibold text-gray-500">City
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input oninput="updateBtnNext3()" id="cityInput" class="pl-2 input-style"
                                               type="text" name="city"
                                               placeholder="ex. Jakarta" value="{{ old('city') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="countryInput" class="font-semibold text-gray-500">Country
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input oninput="updateBtnNext3()" id="countryInput" class="pl-2 input-style"
                                               type="text" name="country"
                                               placeholder="ex. Indonesia" value="{{ old('country') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="addressInput" class="font-semibold text-gray-500">Address
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input oninput="updateBtnNext3()" id="addressInput" class="pl-2 input-style"
                                               type="text" name="address"
                                               placeholder="ex. Mister Potato Street No. 1"
                                               value="{{ old('address') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="postalInput" class="font-semibold text-gray-500">Postal Code
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input oninput="updateBtnNext3()" id="postalInput" class="pl-2 input-style"
                                               type="number"
                                               name="postal_code" placeholder="ex. 14045"
                                               value="{{ old('postal_code') }}">
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="notesInput" class="font-semibold text-gray-500">Notes</label>
                                        <input oninput="updateBtnNext3()" id="notesInput" class="pl-2 input-style"
                                               type="text" name="notes"
                                               placeholder="ex. White building, Yellow Roof" value="{{ old('notes') }}">
                                    </div>
                                </div>
                                <div class="flex flex-row w-full gap-2">
                                    <button class="w-fit h-fit py-2 px-12 bg-gray-200 text-black rounded-md"
                                            onclick="updateProgress(event, -1)">
                                        Back
                                    </button>
                                    <button
                                        id="button-progress-3"
                                        class="flex-grow rounded-lg bg-green-600 text-white font-semibold p-2 box-border self-center"
                                        type="submit">Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let progress = 0;

        function updateBtnNext3() {
            const lat = document.getElementById("latitudeText");
            const long = document.getElementById("longitudeText");
            const cit = document.getElementById("cityInput");
            const cont = document.getElementById("countryInput");
            const address = document.getElementById("addressInput");
            const postal = document.getElementById("postalInput");

            if (lat.innerHTML.length < 1 || long.innerHTML.length < 1 || cit.value.length < 3 && cont.value.length < 1 || address.value.length < 1 || postal.value.length < 1) {
                updateClasses("button-progress-3", ["!bg-gray-100", "text-gray-400"], ["bg-green-600", "text-white"]);
                document.getElementById("button-progress-3").setAttribute("disabled", "disabled")
            } else if (cit.value.length > 25 || cont.value.length > 25 || address.value.length > 255 || postal.value.length !== 5) {
                updateClasses("button-progress-3", ["!bg-gray-100", "text-gray-400"], ["bg-green-600", "text-white"]);
                document.getElementById("button-progress-3").setAttribute("disabled", "disabled")
            } else {
                updateClasses("button-progress-3", ["!bg-green-600", "text-white"], ["!bg-gray-100"]);
                document.getElementById("button-progress-3").removeAttribute("disabled")
            }


        }

        function updateBtnNext2() {
            const e = document.getElementById("nameInput");
            if (e.value.length > 5) {
                updateClasses("button-progress-2", ["bg-green-600", "text-white"], ["bg-gray-100"]);
                document.getElementById("button-progress-2").removeAttribute("disabled")
            }
        }

        function updateBtnNext1() {
            const e = document.getElementById("phoneNumberInput");
            if (e.value.startsWith(0) && e.value.length > 7) {
                updateClasses("button-progress-1", ["bg-green-600", "text-white"], ["bg-gray-100"]);
                document.getElementById("button-progress-1").removeAttribute("disabled")
            } else {
                updateClasses("button-progress-1", ["bg-gray-100", "text-gray-400"], ["bg-green-600", "text-white"]);
                document.getElementById("button-progress-1").setAttribute("disabled", "disabled")
            }
        }


        function updateClasses(id, classesToAdd, classesToRemove) {
            const element = document.getElementById(id);
            classesToAdd.forEach(className => element.classList.add(className));
            classesToRemove.forEach(className => element.classList.remove(className));
        }

        const svg = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            `;

        function updateSVG(id, svg) {
            document.getElementById(id).innerHTML = svg;
        }

        function updateUI() {
            if (progress === 0) {
                updateClasses("progress-indicator1", ["ring-green-500"], []);
                updateClasses("progress-indicator2", ["text-white", "bg-gray-300"], ["ring-1"]);
                updateClasses("progress-indicator3", ["text-white", "bg-gray-300"], ["ring-1"]);
                updateClasses("form-content1", [], ["hidden"]);
                updateClasses("form-content2", ["hidden"], []);
                updateClasses("form-content3", ["hidden"], []);
                updateBtnNext1();
            } else if (progress === 1) {
                updateClasses("progress-indicator1", ["bg-green-600", "text-white"], []);
                updateSVG("progress-indicator1", svg);
                updateClasses("progress-indicator2", ["ring-green-500"], []);
                updateClasses("progress-indicator3", ["text-white", "bg-gray-300"], ["ring-1"]);
                updateClasses("form-content1", ["hidden"], []);
                updateClasses("form-content2", [], ["hidden"]);
                updateClasses("form-content3", ["hidden"], []);
                updateBtnNext2();
            } else if (progress === 2) {
                updateClasses("progress-indicator1", ["bg-green-600", "text-white"], []);
                updateClasses("progress-indicator2", ["bg-green-600", "text-white"], []);
                updateSVG("progress-indicator1", svg);
                updateSVG("progress-indicator2", svg);
                updateClasses("progress-indicator3", ["ring-green-500"], []);
                updateClasses("form-content1", ["hidden"], []);
                updateClasses("form-content2", ["hidden"], []);
                updateClasses("form-content3", [], ["hidden"]);
            }
        }

        function updateProgress(e, steps) {
            e.preventDefault()
            progress += steps;

            updateUI();
        }

        window.onload = function () {
            updateUI();
            console.log("ONLOAD CALLED")
            updateBtnNext1();
            updateBtnNext2();
            updateBtnNext3();
            const form = document.getElementById('registrationForm');
            form.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                }
            });
        }

        let pos = 0;
        let lat = 0;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                document.getElementById("latitudeText").innerHTML = `Latitude: ${pos.lat}`;
                document.getElementById("longitudeText").innerHTML = `Longitude: ${pos.lng}`;
                document.getElementById("lat").value = pos.lat;
                document.getElementById("long").value = pos.lng;

                console.log(document.getElementById("long").value)
            }, function () {
                console.log("Error 2")
            });
        } else {
            console.log("Error 1")
        }

    </script>
@endsection
