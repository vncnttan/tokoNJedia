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
            $message = [
                'username.required' => 'Username is required',
                'username.min' => 'Username must be at least 3 characters',
                'username.max' => 'Username must be at most 20 characters',
                'username.unique' => 'Username already exists',
            ];
            $validate = Validator::make($request->all(), [
                'username' => 'required|min:3|max:20|unique:users,username' . $user->id,
            ], $message);
            if ($validate->fails()) {
                toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                return redirect()->back()->withErrors($validate)->withInput()->with('error', $validate->errors()->first());
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
            $message = [
                'dob.required' => 'DOB is required',
                'dob.date_format' => 'DOB must be in format mm/dd/yyyy',
                'dob.after_or_equal' => 'User must be at least 18 years old',
            ];
            $validate = Validator::make($request->all(), [
                'dob' => [
                    'required',
                    'date_format:m/d/Y',
                    'after_or_equal:01/01/1970',
                    today()->subtract(18, 'years')
                ],
            ], $message);
            if ($validate->fails()) {
                toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
                return redirect()->back()->withErrors($validate)->withInput()->with('error', $validate->errors()->first());
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
