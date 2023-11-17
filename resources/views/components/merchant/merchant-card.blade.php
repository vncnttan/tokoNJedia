<a href="/merchant-page/{{ $merchant->id }}">
    <div class="w-72 h-36 md:w-80 md:h-36 rounded-md shadow-md">
        <div class="flex flex-row m-2 gap-2">
            <img src="{{ $merchant->image }}"
                 alt="{{ $merchant->name }}"
                 class="h-12 w-1/6 rounded-full object-cover"
            />
            <div class="flex flex-row gap-2 w-4/5 justify-between place-items-center">
                <div class="flex flex-col whitespace-nowrap overflow-hidden" >
                    <div class="text-sm font-bold whitespace-nowrap overflow-hidden" style="text-overflow: ellipsis">
                        {{ $merchant->name }}
                    </div>
                    <div class="text-xs text-gray-500">
                        {{ $merchant->location[0]->city }}
                    </div>
                </div>
                <button class="h-fit w-24 py-1 rounded-md font-semibold text-green-600 border-green-600 border-[1px]">
                    View Shop
                </button>
            </div>
        </div>
    </div>
</a>
