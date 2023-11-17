@extends('templates.template')

@section('title', 'Merchant')

@section('content')
    <div class="max-w-7xl w-screen h-screen flex-1 flex justify-evenly place-items-center gap-16 p-4 sm:px-6 lg:px-8">
        <div class="flex-grow w-1/2 h-screen flex justify-center place-items-center">
            <div class="h-full flex flex-col justify-center items-start gap-8 text-md ">
                <div class="w-full flex justify-start items-center gap-8">
                    <img src="{{ url(asset("assets/merchants/free-benefit.png")) }}" alt="">
                    <p>Open a merchant Account <b>free</b> without any charges.</p>
                </div>
                <div class="w-full flex justify-start items-center gap-8">
                    <img src="{{ url(asset("assets/merchants/reach-benefit.png")) }}" alt="">
                    <p>More than <b>90 millions</b> active users every month.</p>
                </div>
                <div class="w-full flex justify-start items-center gap-8">
                    <img src="{{ url(asset("assets/merchants/user-benefit.png")) }}"
                         alt="">
                    <p><b>Reach 97%</b> potential user across Indonesia</p>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full rounded-lg bg-white ring-gray-200 ring-1 p-8 box-border">
            <div class="w-full h-full flex flex-col justify-center gap-8">
                <p class="text-black text-xl font-semibold">Hello, {{ Auth::user()->username }} lets fill in your
                    merchant detail</p>
                <form class="w-full flex flex-col justify-center items-start gap-12" method="POST"
                      action="/merchant">
                    @csrf
                    <div class="w-full flex gap-6">
                        <h1 id="progress-indicator1"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            1
                        </h1>
                        <div class="flex-grow flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Phone Number</h1>
                            <div class="flex flex-col gap-1" id="form-content1">
                                <label for="phoneNumberInput">Phone Number</label>
                                <input id="phoneNumberInput" class="input-style" type="number" name="phone"
                                       value="{{old('phone')}}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex gap-6">
                        <h1 id="progress-indicator2"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            2
                        </h1>
                        <div class="flex-grow flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Merchant Name</h1>
                            <div id="form-content2" class="flex flex-col gap-1">
                                <label for="nameInput">Name</label>
                                <input id="nameInput" class="input-style" type="text" name="name"
                                       value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="w-full flex gap-6">
                        <h1 id="progress-indicator3"
                            class="w-10 h-10 text-green-600 font-bold rounded-full p-2 text-center ring-1 ring-green-500">
                            3
                        </h1>
                        <div class="flex-grow flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Location</h1>
                            <div class="flex flex-col gap-1" id="form-content3">

                                <label for="cityInput">City</label>
                                <input id="cityInput" class="input-style" type="text" name="city"
                                       value="{{old('city')}}">
                                <label for="countryInput">Country</label>
                                <input id="countryInput" class="input-style" type="text" name="country"
                                       value="{{old('country')}}">
                                <label for="addressInput">Address</label>
                                <input id="addressInput" class="input-style" type="text" name="address"
                                       value="{{old('address')}}">
                                <label for="postalInput">Postal Code</label>
                                <input id="postalInput" class="input-style" type="number" name="postal_code"
                                       value="{{old('postal_code')}}">
                                <label for="notesInput">Notes</label>
                                <input id="notesInput" class="input-style" type="text" name="notes"
                                       value="{{old('notes')}}">
                                <button
                                    class="my-4 w-full rounded-lg bg-green-500 text-white text-xl font-semibold p-2 box-border self-center"
                                    type="submit">Save
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let progress = 2;

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
            } else if (progress === 1) {
                updateClasses("progress-indicator1", ["bg-green-600", "text-white"], []);
                updateSVG("progress-indicator1", svg);
                updateClasses("progress-indicator2", ["ring-green-500"], []);
                updateClasses("progress-indicator3", ["text-white", "bg-gray-300"], ["ring-1"]);
                updateClasses("form-content1", ["hidden"], []);
                updateClasses("form-content2", [], ["hidden"]);
                updateClasses("form-content3", ["hidden"], []);
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

        function updateProgress() {
            progress += 1;

            updateUI();
        }

        window.onload = function () {
            updateUI();
        }
    </script>
@endsection
