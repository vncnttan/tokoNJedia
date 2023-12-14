<a href="/merchant/{{ $merchant->id }}">
    <div class="w-72 md:w-80 rounded-md shadow-md flex flex-col gap-2">
        <div class="flex flex-row p-2 gap-2">
            <img src="{{ $merchant->image ?? asset('assets/logo/logo.png') }}"
                 alt="{{ $merchant->name }}"
                 class="h-12 w-1/6 rounded-full object-cover"
            />
            <div class="flex flex-row gap-2 w-4/5 justify-between place-items-center">
                <div class="flex flex-col whitespace-nowrap overflow-hidden flex-grow">
                    <div class="text-sm font-bold whitespace-nowrap overflow-hidden" style="text-overflow: ellipsis">
                        {{ $merchant->name }}
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ $merchant->location[0]->city }}
                    </div>
                </div>
                <button
                    class="h-fit w-24 py-1 rounded-md font-semibold text-green-600 border-green-600 border-[1px] flex-shrink-0">
                    View Shop
                </button>
            </div>
        </div>
        <div class="w-full h-full flex flex-row gap-1.5 pb-4 justify-center">
            @for($i = 0; $i < 3; $i++)
                @if($merchant->products->count() > $i)
                    <a class="h-full w-fit z-10" href="/product-detail/{{ $merchant->products[$i]->id }}">
                        <div class="flex flex-col gap-1 font-semibold text-sm">
                            <img src="{{ $merchant->products[$i]->productImages[0]->image }}"
                                 alt="{{ $merchant->products[$i]->name }}"
                                 class="rounded-md object-cover md:w-24 md:h-24 w-20 h-20"
                            />
                            Rp{{ formatPrice($merchant->products[$i]->productVariants[0]->price) }}
                        </div>
                    </a>
{{--                    @dd($merchant->products[$i])--}}
                @endif
            @endfor
        </div>
    </div>
</a>
