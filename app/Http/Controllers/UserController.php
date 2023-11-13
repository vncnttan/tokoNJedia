<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function updateUsername(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = Validator::make($request->all(), [
                'username' => 'required|min:3|max:20|unique:users,username'.$user->id,
            ]);
            if($validate->fails()){
                return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Username must be filled');
            }
            $user->username = $request->username;
            $user->save();
        }
        return redirect('/profile');
    }
    public function updateDob(Request $request){
        $user = User::find(Auth::user()->id);
        if($user){
            $validate = Validator::make($request->all(), [
                'dob' => [
                    'required',
                    'date_format:m/d/Y',
                    'after_or_equal:01/01/1970',
                    'before_or_equal:12/31/2009'
                ],
            ]);
            if($validate->fails()){
                return redirect()->back()->toastr()->error('DOB must be filled');
            }
            $user->dob = $request->dob;
            $user->save();
        }
        return redirect('/profile');
    }
}
