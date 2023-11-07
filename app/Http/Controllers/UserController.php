<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function storeOrUpdateUsername(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = Validator::make($request->all(), [
                'username' => 'required|min:3|max:20|unique:users,username'.$user->id,
            ]);
            if($validate->failed()){
                return redirect()->back()->withInput();
            }
            $user->username = $request->username;
            $user->save();
        }
        return redirect()->back();
    }
}
