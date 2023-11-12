<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Factory;

class FirebaseService
{
    protected Storage $storage;
    public function __construct(Storage $storage)
    {
        $this->storage = $storage;

    }

    public function uploadImage(File $file){
        $storage = app('firebase.storage');
        $storageClient = $storage->getStorageClient();
        $defaultBucket = $storage->getBucket();
        $anotherBucket = $storage->getBucket('gs://bplaravel.appspot.com');
        $storage = (new Factory)->withDefaultStorageBucket('gs://bplaravel.appspot.com')->createStorage();

    }


    // public function index(Request $request)
    // {
    //     $image = $request->file('image');
    //     $student   = app('firebase.firestore')->database()->collection('images')->document('defT5uT7SDu9K5RFtIdl');
    //     $firebase_storage_path = 'images/';
    //     $name     = $student->id();
    //     $localfolder = public_path('firebase-temp-uploads') . '/';
    //     $extension = $image->getClientOriginalExtension();
    //     $file      = $name . '.' . $extension;
    //     if ($image->move($localfolder, $file)) {
    //         $uploadedfile = fopen($localfolder . $file, 'r');
    //         app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $name]);

    //         unlink($localfolder . $file);
    //         echo 'success';
    //     } else {
    //         echo 'error';
    //     }
    // }
}
