<div class="flex flex-col gap-4">
    <div class="font-bold text-sm">
        CUSTOMER'S PHOTOS & VIDEOS
    </div>

    @foreach($recommendedImages as $image)
        <div class="w-full h-64 bg-gray-200 rounded-lg">
            <img src="{{ $image->image }}" alt="customer review image" class="w-full h-full object-cover rounded-lg">
        </div>
    @endforeach
    <div class="flex flex-col gap-2 py-2">
        <div class="font-bold text-sm">
            REVIEWS
        </div>

    </div>
</div>
