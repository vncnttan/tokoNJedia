<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function updateUsername(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user) {
            $validate = Validator::make($request->all(), [
                'username' => 'required|min:3|max:20|unique:users,username' . $user->id,
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput()->with('error', 'Username must be filled');
            }
            $user->username = $request->username;
            $user->save();
        }
        return redirect('/profile');
    }

    public function updateDob(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user) {
            $validate = Validator::make($request->all(), [
                'dob' => [
                    'required',
                    'date_format:m/d/Y',
                    'after_or_equal:01/01/1970',
                    'before_or_equal:12/31/2009'
                ],
            ]);
            if ($validate->fails()) {
                toastr()->error('DOB must be filled');
                return redirect()->back();
            }
            $user->dob = $request->dob;
            $user->save();
        }
        return redirect('/profile');
    }

    public function updateImage(Request $request)
    {
        $messages = [
            'max' => 'Image size must not be more than 10mb'
        ];
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:10240',
        ], $messages);
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect('/profile');
        }
        $file = $request->file('file');
        $res = StorageService::uploadFile("images", $file);
        if ($res === null) {
            toastr()->error('Update Profile Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect('/profile');
        }
        /** @var User $user */
        $user = Auth::user();
        $image = $user->image;
        StorageService::deleteFile("images", $image);
        $user->image = $res;
        $user->save();
        toastr()->success('Update Profile Image Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return redirect('/profile');
    }



}
