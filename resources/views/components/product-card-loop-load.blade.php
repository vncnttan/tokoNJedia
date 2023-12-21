@foreach($products as $product)
    <x-product-card
        :productId="$product->id"
        :productPromoId="getMaximumPromo($product->id)"
        :flashSalePromoId="getMaximumPromo($product->id)"
    />
@endforeach
