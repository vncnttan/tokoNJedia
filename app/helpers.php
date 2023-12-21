<?php

use App\Models\FlashSaleProduct;
use App\Models\Location;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductPromo;
use App\Models\ProductVariant;
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

if (!function_exists('calculateTotalPrice')) {
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
    function getPriceAfterPromo($productId, $productVariantId, $promoId, $source): int
    {
        $product = ProductVariant::find($productVariantId);
        $price = $product->price;

        if ($source == 'promo') {
            $promo = ProductPromo::where('promo_id', 'like', $promoId)->where('product_id', 'like', $productId)->first();
        } else if ($source == 'flash-sale') {
            $promo = FlashSaleProduct::find($promoId);
        }

        $discount = $promo->discount;

        return $price - ($price * $discount / 100);
    }
}

if (!function_exists("getPriceAfterMaxPromo")) {
    function getPriceAfterMaxPromo($productId): int
    {
        $product = Product::find($productId);
        $price = $product->price;
        $discount = getMaximumDiscount($productId);

        return $price - ($price * $discount / 100);
    }
}


if (!function_exists("getMaximumDiscount")) {
    function getMaximumDiscount($productId)
    {
        $promo = ProductPromo::where('product_id', $productId)->orderBy('dicount', 'desc')->first();
        $flashSale = FlashSaleProduct::where('product_id', $productId)->orderBy('discount', 'desc')->first();

        $discount = 0;
        if ($promo && $flashSale) {
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

if (!function_exists("getFlashSaleProductId")) {
    function getFlashSaleProductId($productId)
    {
        $flashSale = FlashSaleProduct::where('product_id', $productId)->orderBy('discount', 'desc')->first();
        return $flashSale->id;
    }
}

if (!function_exists("getMaximumPromo")) {
    function getMaximumPromo($productId)
    {
        $promo = ProductPromo::where('product_id', $productId)->orderBy('discount', 'desc')->first();
        $flashSale = FlashSaleProduct::where('product_id', $productId)->orderBy('discount', 'desc')->first();

        $id = null;
        if ($promo && $flashSale) {
            if ($promo->discount > $flashSale->discount) {
                $id = $promo->id;
            } else if ($flashSale->discount > $promo->discount) {
                $id = $flashSale->id;
            }
        } else if ($promo) {
            $id = $promo->id;
        } else if ($flashSale) {
            $id = $flashSale->id;
        }

        return $id;
    }
}

if (!function_exists('getProductAfterPromo')) {
    function getProductAfterPromo($productVariantId)
    {
        $productVariant = ProductVariant::find($productVariantId);
        $product = Product::find($productVariant->product_id);
        $maxPromoId = getMaximumPromo($product->id);

        $productPromo = ProductPromo::find($maxPromoId);
        $flashSaleProduct = FlashSaleProduct::find($maxPromoId);

        if ($productPromo) {
            $product->discount = $productPromo->discount;
            $product->discountedPrice = $productVariant->price - ($productVariant->price * $productPromo->discount / 100);
            $product->promoName = $productPromo->Promo->promo_name;
        } else if ($flashSaleProduct) {
            $product->discount = $flashSaleProduct->discount;
            $product->discountedPrice = $productVariant->price - ($productVariant->price * $flashSaleProduct->discount / 100);
            $product->promoName = 'Flash Sale';
        } else {
            $product->discount = 0;
            $product->discountedPrice = $productVariant->price;
            $product->promoName = null;
        }

        return $product;
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
