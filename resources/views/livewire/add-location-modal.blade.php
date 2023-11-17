<div>
    <div class="flex flex-col gap-2">
        <div class="p-4 border-b-[1px] border-gray-300 flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-center">
                Add Address
            </h1>

            <div class="px-[15%] grid grid-cols-3 text-xs text-center gap-0.5">
                <div class="p-1 font-bold w-7 h-7 text-green-600 border-green-600 rounded-full border-[1px] mx-auto">
                    1
                </div>
                <div class="p-1 font-bold w-7 h-7 text-green-600 border-green-600 rounded-full border-[1px] mx-auto">
                    2
                </div>
                <div class="p-1 font-bold w-7 h-7 text-green-600 border-green-600 rounded-full border-[1px] mx-auto">
                    3
                </div>
                <div> Search your destination address</div>
                <div> Pinpoint location</div>
                <div> Complete address detail</div>
            </div>
        </div>
        <div class="p-8 flex flex-col gap-4">
            <div class="font-bold text-xl">
                Where is your destination?
            </div>
            <div class="font-bold text-xl">
                Input
            </div>
            <div class="form-group">
                <label>Location/City/Address</label>
                <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                       placeholder="Choose Location">
            </div>

            <div class="form-group" id="latitudeArea">
                <label>Latitude</label>
                <input type="text" id="latitude" name="latitude" class="form-control">
            </div>

            <div class="form-group" id="longitudeArea">
                <label>Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <script>
        document.getElementById("latitudeArea").classList.add("d-none");
        document.getElementById("longitudeArea").classList.add("d-none");

        window.initialize = function () {
            const input = document.getElementById('autocomplete');
            const autocomplete = new google.maps.places.Autocomplete(input);

            autocomplete.addListener('place_changed', function () {
                const place = autocomplete.getPlace();
                document.getElementById('latitude').value = place.geometry['location'].lat();
                document.getElementById('longitude').value = place.geometry['location'].lng();
                console.log(place.geometry['location'])

                document.getElementById("latitudeArea").classList.remove("d-none");
                document.getElementById("longitudeArea").classList.remove("d-none");
            });

        }

        let scriptId = 'googleMapsScript';
        let existingScript = document.getElementById(scriptId);

        if (!existingScript) {
            let script = document.createElement('script');
            script.id = scriptId;
            script.src = "https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places&callback=initialize";
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);
        }

    </script>

    <script>
        let $progress = 0;
        console.log("A")
    </script>
</div>
