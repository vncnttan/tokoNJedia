<div class="pt-16 pb-4 text-gray-600 my-10 border-t-[1px] border-gray-500 border-opacity-30">
    <div class="flex flex-col gap-10">
        <div class="font-bold">
            Store Information {{ $merchant->name }}
        </div>
        <div class="flex flex-col gap-3">
            <div class="font-bold text-sm">
                Description {{ $merchant->name }}
            </div>
            <div class="text-xs">
                {{ $merchant->description }}
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="font-bold text-sm">
                Open Since
            </div>
            <div class="text-xs">
                {{ $merchant->created_at->format('F Y') }}
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="font-bold text-sm">
                {{$merchant->catch_phrase}}
            </div>
            <div class="text-xs">
                {{ $merchant->full_description }}
            </div>
        </div>
    </div>
</div>
