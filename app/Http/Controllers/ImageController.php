<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $image = $request->file('image');
        $student   = app('firebase.firestore')->database()->collection('images')->document('defT5uT7SDu9K5RFtIdl');
        $firebase_storage_path = 'images/';
        $name     = $student->id();
        $localFolder = public_path('firebase-temp-uploads') . '/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name . '.' . $extension;
        if ($image->move($localFolder, $file)) {
            $uploadedFile = fopen($localFolder . $file, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedFile, ['name' => $firebase_storage_path . $name]);

            unlink($localFolder . $file);
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
