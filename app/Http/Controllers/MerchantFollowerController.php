<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\MerchantFollower;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchantFollowerController extends Controller
{
    public function index() {
        $user = auth()->user();
        $storeFollowers = MerchantFollower::where('user_id', $user->id)->get();
        $stores = Merchant::whereIn('id', $storeFollowers->pluck('merchant_id'))->get();
        return view('pages.profile.profile-page-following', ['stores' => $stores]);
    }

    public function follow (Request $request) {
        if(!auth()->check()) return redirect()->route('login');
        $user = auth()->user();
        $newFollow = MerchantFollower::where('user_id', $user->id)->where('merchant_id', $request->merchant_id)->first();
        if ($newFollow) {
            $newFollow->delete();
            return redirect()->back();
        }
        $newFollow = new MerchantFollower();
        $newFollow->id = Str::uuid();
        $newFollow->user_id = $user->id;
        $newFollow->merchant_id = $request->merchant_id;
        $newFollow->save();

        return redirect()->back();
    }
}
