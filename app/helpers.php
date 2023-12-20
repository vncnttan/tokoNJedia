<?php

use App\Models\FlashSaleProduct;
use App\Models\Location;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductPromo;
use App\Models\Review;
use App\Models\Shipment;
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

        $distance = $angle * 6371;

        return $basePrice + ($distance / 1000) * $variablePrice;
    }
}

if(!function_exists('calculateTotalPrice')) {
    function calculateTotalPrice($price, $quantity, $merchantId, $userLocationId, $shipmentId, $discountPercentage): int
    {
        $merchant = Merchant::find($merchantId);
        $merchantLat = $merchant->location[0]->latitude;
        $merchantLong = $merchant->location[0]->longitude;

        $userLocation = Location::find($userLocationId);
        $userLat = $userLocation->latitude;
        $userLong = $userLocation->longitude;

        $shipment = Shipment::find($shipmentId);

        $shipmentPrice = shipmentPriceCalculate($userLat, $userLong, $merchantLat, $merchantLong, $shipment->base_price, $shipment->variable_price);

        return ($price * $quantity) - (($price * $quantity) * $discountPercentage / 100) + $shipmentPrice;
    }
}


if (!function_exists("getPriceAfterPromo")) {
    function getPriceAfterPromo($productId): int
    {
        $product = Product::find($productId);
        $price = $product->price;
        $discount = getMaximumDiscount($productId);

        return $price - ($price * $discount / 100);
    }
}

if(!function_exists("getMaximumDiscount")) {
    function getMaximumDiscount($productId) {
        $promo = ProductPromo::where('product_id', $productId)->first();
        $flashSale = FlashSaleProduct::where('product_id', $productId)->first();

        $discount = 0;
        if($promo && $flashSale) {
            if ($promo->discount > $flashSale->discount) {
                $discount = $promo->discount;
            } else if ($flashSale->discount > $promo->discount) {
                $discount = $flashSale->discount;
            }
        } else if ($promo) {
            $discount = $promo->discount;
        } else if ($flashSale) {
            $discount = $flashSale->discount;
        }

        return $discount;
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
