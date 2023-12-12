<a href="/product-detail/{{ $product->id }}">
    {{-- {{ dd($product->Merchant->Location->first()) }} --}}
    <div class="w-36 h-80 md:w-48 md:h-80 rounded-md shadow-md flex flex-col">
        <img src="{{ $product->image }}" alt="{{ $product->name }}"
            class="h-36 md:h-48 rounded-t-md w-full object-cover" />
        <div class="m-2 flex flex-col gap-0.5">
            <div class="text-md">
                {{ $product->name }}
            </div>
            <div class="text-md font-bold">
                Rp{{ formatPrice($product->price) }}
                {{-- Rp{{$product->price}} --}}
            </div>
            <div class="text-xs text-gray-500">
                {{ $product->Merchant->Location[0]->city }}
            </div>
            <div class="flex flex-ro place-items-center gap-1 text-xs text-gray-500">
                {{-- SVG and Ratings Here --}}
                {{ $product->reviews->count() }} | {{ $product->sold }} terjual
            </div>
        </div>
    </div>
</a>

{{-- <script>
   function formatPrice(price) {
       return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
   }
</script> --}}
