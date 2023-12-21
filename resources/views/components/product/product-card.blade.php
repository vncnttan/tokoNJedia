<a href="/product-detail/{{ $product->id }}" class="z-10 bg-white rounded-md">
    <div class="w-36 min-h-[320px] md:w-48 md:min-h-[320px] rounded-md shadow-md flex flex-col">
        <img src="{{ $product->image }}" alt="{{ $product->name }}"
            class="h-36 md:h-48 rounded-t-md w-full object-cover" />
        @if ($productPromo != null)
            <div class="relative">
                <img class="w-full h-6"
                     src="{{ asset('assets/deals/deals-product-image-accent.png') }}">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-start ps-2">
                    <p class="text-white text-xs font-bold">{{ $productPromo->Promo->promo_name  }}</p>
                </div>
            </div>
        @elseif ($flashSalePromo != null)
            <div class="relative">
                <img class="w-full h-6"
                     src="{{ asset('assets/deals/deals-product-image-accent.png') }}">
                <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-start ps-2">
                    <p class="text-white text-xs font-bold">Flash Sale</p>
                </div>
            </div>
        @endif
        <div class="m-2 flex flex-col gap-0.5">
            <div class="text-md">
                {{ $product->name }}
{{--                {{ substr($product->name, 0, 19) . (strlen($product->name) > 19 ? '...' : '') }}--}}
            </div>
            <div class="text-md">
                @if ($productPromo != null)
                    <div class="font-bold">
                        Rp{{ formatPrice(getPriceAfterPromo($product->id, $product->ProductVariants[0]->id, $productPromo->promo_id, 'promo')) }}
                    </div>
                    <div class="flex gap-1">
                        <span class="line-through text-gray-400 text-xs">
                            Rp{{ formatPrice($product->price) }}
                        </span>
                        <span class="text-xs text-red-500 font-bold">{{ $productPromo->discount  }}%</span>
                    </div>
                @elseif ($flashSalePromo != null)
                    <div class="font-bold">
                        Rp{{ formatPrice(getPriceAfterPromo($product->id, $product->ProductVariants[0]->id, $flashSalePromo->id, 'flash-sale')) }}
                    </div>
                    <div class="flex gap-1">
                            <span class="line-through text-gray-400 text-xs">
                                Rp{{ formatPrice($product->price) }}
                            </span>
                        <span class="text-xs text-red-500 font-bold">{{ $flashSalePromo->discount }}%</span>
                    </div>
                @else
                    <div class="font-bold">
                        Rp{{ formatPrice($product->price) }}
                    </div>
                @endif
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

