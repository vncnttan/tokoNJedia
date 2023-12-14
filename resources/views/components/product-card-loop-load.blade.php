@foreach($products as $product)
    <x-product-card :productId="$product->id"/>
@endforeach
