<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantFollowerController extends Controller
{
    public function index() {
        $stores = auth()->user()->following();
        return view('pages.profile.profile-page-following', compact('stores'));
    }
}
