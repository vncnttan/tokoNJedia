<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Yoeunes\Toastr\Facades\Toastr;

class UserController extends Controller
{

    public function upload(Request $request){
        $this->validate($request, [
            'file' => 'required|file',
        ]);

        $file = $request->file('file');
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $firebaseStoragePath = '/images';

        $firebaseFactory = (new Factory)->withServiceAccount(base_path('storage/app/firebase_credentials.json'));
        $storage = $firebaseFactory->createStorage();
        $defaultBucket = $storage->getBucket();

        try {
            $stream = fopen($file->getRealPath(), 'r');
            $defaultBucket->upload($stream, [
                'name' => $firebaseStoragePath . '/' . $fileName
            ]);

            fclose($stream);
            toastr()->success('Update Profile Image Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back();
        } catch (\Exception $e) {
            if (isset($stream) && is_resource($stream)) {
                fclose($stream);
            }
            dd($e);
            toastr()->error('Update Profile Image Failed', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 3000,]);
            return redirect()->back();
        }
    }
}
