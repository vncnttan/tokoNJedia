<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public static function extractFilename($url) {
        $parsedUrl = parse_url($url);
        $path = $parsedUrl['path'] ?? '';
        $decodedPath = urldecode($path);
        $filename = basename($decodedPath);

        return $filename;
    }
}
