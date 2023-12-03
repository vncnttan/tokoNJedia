<div>
    <div class="flex flex-col gap-2">
        <div class="p-4 border-b-[1px] border-gray-300 flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-center">
                Add Address
            </h1>

            <div class="px-[15%] grid grid-cols-2 text-xs text-center gap-0.5">
                <div id="progress-indicator1"
                     class="p-1 font-bold w-7 h-7 text-green-600 border-green-600 rounded-full border-[1px] mx-auto">
                    1
                </div>
                <div id="progress-indicator2"
                     class="p-1 font-bold w-7 h-7 text-green-600 border-green-600 rounded-full border-[1px] mx-auto">
                    2
                </div>
                <div> Pinpoint Location</div>
                <div> Complete address detail</div>
            </div>
        </div>
        <div id="form-content1" class="p-8 flex flex-col gap-6">
            <div class="font-bold text-xl">
                Please Confirm this is your address?
            </div>
            <div class="map-container flex flex-col gap-2">
                <div class="map rounded-md" id="map" style="width: 100%; height: 300px;"></div>
                <div class="flex flex-row justify-evenly text-center">
                    <div id="latitude-container">
                        Latitude:
                    </div>
                    <div id="longitude-container">
                        Longitude:
                    </div>
                </div>
            </div>
            <button onclick="
                if(window.latitude == null || window.longitude == null) {
                    return;
                }
                console.log(window.latitude, window.longitude)
                updateProgress(event, 1)
            " class="py-2 font-semibold bg-green-500 rounded-md text-white">
                Confirm Location
            </button>
        </div>

        <div id="form-content2" class="p-8 flex flex-col gap-8">
            <div class="font-bold text-xl">
                Please complete your address detail
            </div>
            <div class="map-container flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <label for="address" class="font-semibold text-gray-500">Address</label>
                    <textarea type="text" id="address" name="address"
                              class="rounded-md border-[1px] w-full border-gray-300 p-2"
                              placeholder="ex. New Kemanggisan Street No. 10 2F"></textarea>
                </div>
                <div class="flex md:flex-row flex-col justify-stretch gap-2">
                    <div class="flex flex-col gap-1 flex-grow">
                        <label for="city" class="font-semibold text-gray-500">City</label>
                        <input type="text" id="city" name="city" class="rounded-md border-[1px] border-gray-300 p-2"
                               placeholder="ex. Jakarta">
                    </div>
                    <div class="flex flex-col gap-1 flex-grow">
                        <label for="country" class="font-semibold text-gray-500">Country</label>
                        <input type="text" id="country" name="country"
                               class="rounded-md border-[1px] border-gray-300 p-2"
                               placeholder="ex. Indonesia">
                    </div>
                    <div class="flex flex-col gap-1 flex-grow">
                        <label for="postal" class="font-semibold text-gray-500">Postal Code</label>
                        <input type="text" id="postal" name="postal" class="rounded-md border-[1px] border-gray-300 p-2"
                               placeholder="ex. 12025">
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="notes" class="font-semibold text-gray-500">Notes</label>
                    <input type="text" id="notes" name="notes"
                           class="rounded-md border-[1px] w-full border-gray-300 p-2"
                           placeholder="ex. Black Gate, White Building"/>
                </div>
            </div>
            <div id="error-message" class="bg-red-500 text-white w-full p-5 rounded-md hidden"></div>
            <button onclick="
                addLocation()
            " class="py-2 bg-green-500 rounded-md text-white font-bold">Add New Address
            </button>
        </div>
    </div>


    <script>
        window.updateClasses = function (id, classesToAdd, classesToRemove) {
            const element = document.getElementById(id);
            classesToAdd.forEach(className => element.classList.add(className));
            classesToRemove.forEach(className => element.classList.remove(className));
        }

        const svg = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-4.5 h-4.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>
            `;

        window.updateSVG = function (id, svg) {
            document.getElementById(id).innerHTML = svg;
        }

        window.updateUI = function () {
            if (progress === 0) {
                updateClasses("progress-indicator1", ["ring-green-500"], []);
                updateClasses("progress-indicator2", ["text-white", "bg-gray-300"], ["ring-1"]);
                updateClasses("form-content1", [], ["hidden"]);
                updateClasses("form-content2", ["hidden"], []);
            } else if (progress === 1) {
                updateClasses("progress-indicator1", ["bg-green-600", "text-white"], []);
                updateSVG("progress-indicator1", svg);
                updateClasses("progress-indicator2", ["ring-green-500", "bg-white", "text-green-600"], ["bg-gray-300", 'text-white']);
                updateClasses("form-content1", ["hidden"], []);
                updateClasses("form-content2", [], ["hidden"]);
            }
        }

        window.validateAddressForm = function (address, city, country, postal) {
            if (address.trim() === '') {
                return 'Address is required';
            }
            if (city.trim() === '') {
                return 'City is required';
            }
            if (country.trim() === '') {
                return 'Country is required';
            }
            if (postal.trim() === '') {
                return 'Postal code is required';
            }
            if (postal.trim().length !== 5) {
                return 'Postal code must be 5 digits';
            }
            if (!/^\d+$/.test(postal.trim())) {
                return 'Postal code must be a number';
            }
            if (postal.trim().charAt(0) === '0') {
                return 'Postal code cannot start with 0';
            }


            return 'OK'

        }

        window.addLocation = function () {
            const address = document.getElementById('address').value;
            const city = document.getElementById('city').value;
            const country = document.getElementById('country').value;
            const postal = document.getElementById('postal').value;

            if (validateAddressForm(address, city, country, postal) !== 'OK') {
                document.getElementById('error-message').innerHTML = validateAddressForm(address, city, country, postal);
                document.getElementById('error-message').classList.remove('hidden');
                return;
            }

            const data = {
                address: address,
                city: city,
                country: country,
                postal: postal,
                latitude: window.latitude,
                longitude: window.longitude,
                _token: "{{ csrf_token() }}"
            }


            fetch('/profile/location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(() => {
                    location.reload()
                })
                .catch((error) => {
                    console.error('Error:', error);
                })
        }


        window.updateProgress = function (e, steps) {
            e.preventDefault()
            progress += steps;

            updateUI();
        }

        let progress = 0;
        updateUI();

    </script>

    <div id="scriptContainer">

        <script>
            {{--            Google Maps--}}
            let map, marker;

            window.parent.initMap = () => {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 0, lng: 0},
                    zoom: 18
                });
                marker = new google.maps.Marker({
                    position: {lat: 0, lng: 0},
                    map: map
                });

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        document.getElementById('latitude-container').innerHTML = "Latitude: " + pos.lat;
                        document.getElementById('longitude-container').innerHTML = "Longitude: " + pos.lng;

                        window.latitude = pos.lat;
                        window.longitude = pos.lng;

                        marker = new google.maps.Marker({
                            position: pos,
                            map: map
                        });

                        map.setCenter(pos);
                    }, function () {
                        handleLocationError(true, map.getCenter());
                    });
                } else {
                    handleLocationError(false, map.getCenter());
                }

                google.maps.event.addListener(marker, 'click', function () {
                    console.log("Marker Clicked")
                });
            }

            function handleLocationError(browserHasGeolocation, pos) {
                console.log("Location Error")
            }


            let scriptId = 'googleMapsScript';
            let existingScript = document.getElementById(scriptId);

            if (!existingScript) {
                console.log("Script Not Found")
                let script = document.createElement('script');
                script.id = scriptId;
                script.src = "https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initMap";
                script.async = false;
                script.defer = false;
                document.getElementById("scriptContainer").insertBefore(script, document.getElementById("scriptContainer").firstChild);
            }

        </script>


    </div>
</div>
