<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Kreait\Firebase\Factory;

class StorageService
{
    public static function uploadFile(String $path, UploadedFile $file): ?string
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        try {
            $filePath = $file->storeAs('public/'.$path, $fileName, 'local');
            return asset(Storage::url($filePath));
        } catch (Exception $e) {
            return null;
        }
    }

    public static function deleteFile(String $path, String $filename): void
    {
        try {
            $fullPath = $path . '/' . $filename;

            if (Storage::exists($fullPath)) {
                Storage::delete($fullPath);
            } else {
                Log::error('File ' . $fullPath . ' does not exist');
            }
        } catch (Exception $e) {
        }
    }



}
