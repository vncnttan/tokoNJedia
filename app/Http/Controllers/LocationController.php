<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

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
}
