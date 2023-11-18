<?php

use Illuminate\Support\Facades\Http;

if(!function_exists('formatPrice')) {
    function formatPrice($price): string
    {
        return number_format($price, 0, ',', '.');
    }
}

if(!function_exists('getRandomImageURL')) {
    function getRandomImageURL(): string
    {
        $response = Http::get('https://source.unsplash.com/random');
        return $response->effectiveUri();
    }
}
