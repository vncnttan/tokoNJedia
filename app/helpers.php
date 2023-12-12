<?php

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Http;

if (!function_exists('formatPrice')) {
    function formatPrice($price): string
    {
        return number_format($price, 0, ',', '.');
    }
}

if (!function_exists('getRandomImageURL')) {
    function getRandomImageURL(): string
    {
        $response = Http::get('https://source.unsplash.com/random');
        return $response->effectiveUri();
    }
}

if (!function_exists('shipmentPriceCalculate')) {
    function shipmentPriceCalculate($latitudeTo, $longitudeTo, $latitudeFrom, $longitudeFrom, $basePrice, $variablePrice): int
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        $distance = $angle * 6371000;

        return $basePrice + ($distance / 1000000) * $variablePrice;
    }
}

if (!function_exists('calculateMerchantReview')) {
    function calculateMerchantReview($merchantId): int
    {
        $products = Product::where('merchant_id', $merchantId)->get();

        $totalReview = 0;
        $totalCount = 0;

        foreach ($products as $product) {
            $reviews = Review::where('product_id', $product->id)->get();
            $productReview = 0;
            $productCount = 0;

            foreach ($reviews as $review) {
                $productReview += $review->review;
                $productCount++;
            }

            if ($productCount > 0) {
                $productAverage = $productReview / $productCount;
                $totalReview += $productAverage;
                $totalCount++;
            }
        }

        if ($totalCount > 0) {
            $averageReview = $totalReview / $totalCount;
        } else {
            $averageReview = 0;
        }

        return $averageReview;
    }
}
