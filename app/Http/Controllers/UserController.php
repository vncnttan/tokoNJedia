<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FirebaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $res = FirebaseService::uploadFile("images", $file);
        if ($res === null) {
            toastr()->error('Update Profile Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect('/profile');
        }
         /** @var User $user */
        $user = Auth::user();
        $image = $user->image;
        FirebaseService::deleteFile("images", Controller::extractFilename($image));
        $user->image = env("FIREBASE_URL") . "v0/b/" . env("FIREBASE_STORAGE_BUCKET") . "o/images%2F" . $res . "?alt=media";
        $user->save();
        toastr()->success('Update Profile Image Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
        return redirect('/profile');
    }
}
