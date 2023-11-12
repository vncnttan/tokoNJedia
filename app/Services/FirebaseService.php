<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Kreait\Firebase\Contract\Storage;
use Kreait\Firebase\Factory;

class FirebaseService
{
    public static function uploadImage(UploadedFile $file){
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $firebaseStoragePath = 'images';

        $firebaseFactory = (new Factory)->withServiceAccount(base_path('storage/app/firebase_credentials.json'));
        $storage = $firebaseFactory->createStorage();
        $defaultBucket = $storage->getBucket();

        try {
            $stream = fopen($file->getRealPath(), 'r');
            $defaultBucket->upload($stream, [
                'name' => $firebaseStoragePath . '/' . $fileName
            ]);

            if (isset($stream) && is_resource($stream)) {
                fclose($stream);
            }

            return $fileName;
        } catch (\Exception $e) {
            if (isset($stream) && is_resource($stream)) {
                fclose($stream);
            }
            return null;
        }
    }


}
