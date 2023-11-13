<div class="flex flex-col gap-5">
    <h1 class="text-4xl font-bold">Recommended for you</h1>
    <div class="flex flex-row flex-wrap gap-3">
        @foreach($recommendedProducts as $product)
            <x-product-card :productId="$product->id"/>
        @endforeach
    </div>
</div>
