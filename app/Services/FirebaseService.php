<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Kreait\Firebase\Factory;

class FirebaseService
{
    public static function uploadFile(String $path, UploadedFile $file){
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        $firebaseFactory = (new Factory)->withServiceAccount(base_path('storage/app/firebase_credentials.json'));
        $storage = $firebaseFactory->createStorage();
        $defaultBucket = $storage->getBucket();

        try {
            $stream = fopen($file->getRealPath(), 'r');
            $defaultBucket->upload($stream, [
                'name' => $path . '/' . $fileName
            ]);

            if (isset($stream) && is_resource($stream)) {
                fclose($stream);
            }

            return env("FIREBASE_URL") . "v0/b/" . env("FIREBASE_STORAGE_BUCKET") . "o/images%2F" . $fileName . "?alt=media";
        } catch (\Exception $e) {
            if (isset($stream) && is_resource($stream)) {
                fclose($stream);
            }
            return null;
        }
    }

    public static function deleteFile(String $path, String $filename){
        $firebaseFactory = (new Factory)->withServiceAccount(base_path('storage/app/firebase_credentials.json'));
        $storage = $firebaseFactory->createStorage();
        $defaultBucket = $storage->getBucket();
        try {
            $defaultBucket->object($path . '/' . Controller::extractFilename($filename))->delete();
        } catch (\Exception $e) {
            // Handle exception if the file does not exist or any other errors
            // Log the error or handle it as per your requirement
        }
    }


}
