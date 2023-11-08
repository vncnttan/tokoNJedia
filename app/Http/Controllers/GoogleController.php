<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle(): RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect('/');
    }

    public function handleGoogleCallback() {
        try {
//            TODO: Get rid of stateless tapi perlu config
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('google_id', $user->getId())->first();
            if($findUser) {
                Auth::login($findUser);
            } else {
//                dd($findUser, User::all(), $user, $user->getId());
                $newUser = User::create([
                    'username' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                ]);

                Auth::login($newUser);
            }
            return redirect()->intended('/');


        } catch (Exception $e) {
            dd($e);
        }
    }
}
