<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Flasher\Laravel\Support\Laravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function store(Request $request){
        $location = new Location();
        $location->city = $request->city;
        $location->country = $request->country;
        $location->address = $request->address;
        $location->postal_code = $request->postal_code;
        $location->notes = $request->notes;
        $location->save();
    }

    public function location()
    {
        return view('pages.profile.profile-page-location');
    }

    public function updateLocation(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'digits' => 'The :attribute field must be 5 digits.',
            'numeric' => 'The :attribute field must be numeric.'
        ];

        $validate = Validator::make($request->all(), [
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postal' => 'required|digits:5|numeric',
            'latitude' => 'required',
            'longitude' => 'required'
        ], $messages);

        if ($validate->fails()) {
            return response()->json(['errors' => $validate->errors()->first()]);
        }


        $address = $request->address;
        $city = $request->city;
        $country = $request->country;
        $postal = $request->postal;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $location = new Location();
        $location->city = $city;
        $location->country = $country;
        $location->address = $address;
        $location->postal_code = $postal;
        $location->latitude = $latitude;
        $location->longitude = $longitude;

        $user = auth()->user();

        $location->locationable_type = 'App\Models\User';
        $location->locationable_id = $user->id;

        $location->save();

        return $location;
    }

    public function deleteLocation(Request $request)
    {
        $location = Location::find($request->id);
        Log::info("LOCATION DELETE ".$location);
        $location->delete();

        return $location;
    }

}
