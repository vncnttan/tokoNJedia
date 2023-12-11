<div class="flex flex-col gap-4">
    <div class="font-bold text-sm">
        CUSTOMER'S PHOTOS & VIDEOS
    </div>

    <div class="flex flex-row gap-2">
        @foreach($recommendedImages as $image)
            <a href="{{ $image->image }}" target="_blank">
                <div class="h-24 w-24 bg-gray-200 rounded-lg border-gray-500 border border-opacity-30">
                    <img src="{{ $image->image }}" alt="customer review image"
                         class="w-full h-full object-cover rounded-lg">
                </div>
            </a>
        @endforeach
    </div>
    <div class="flex flex-col gap-2 py-2">
        <div class="font-bold text-sm">
            REVIEWS
        </div>
        @foreach($reviews as $rev)
            <div class="py-4 border-opacity-30 border-b border-gray-500 flex flex-col gap-12">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-row gap-1">
                        @for($i = 0; $i < $rev->rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-yellow-500"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 12.585l-4.243 2.415 1.618-4.92L2.93 7.17l5.305-.386L10 2l2.765 4.784 5.305.386-4.445 3.91 1.618 4.92L10 12.585z"/>
                            </svg>
                        @endfor
                        @for($i = 0; $i < 5 - $rev->rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-gray-400"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path
                                    d="M10 12.585l-4.243 2.415 1.618-4.92L2.93 7.17l5.305-.386L10 2l2.765 4.784 5.305.386-4.445 3.91 1.618 4.92L10 12.585z"/>
                            </svg>
                        @endfor
                    </div>
                    <div class="flex flex-row place-items-center gap-3">
                        <img src="{{ asset($rev->user->image) }}" alt="{{$rev->user->username}} Profile Picture Image"
                             class="rounded-full h-8 w-8"/>
                        <div class="font-semibold">
                            {{ $rev->user->username }}
                        </div>
                    </div>
                    <div>
                        {{ $rev->message }}
                    </div>
                </div>
                <div class="w-full text-end">
                    See Reply
                </div>

                @can('admin-view')
                    <div class="flex flex-row gap-2">
                        <button class="bg-green-500 text-white rounded-lg px-4 py-2">
                            Approve
                        </button>
                        <button class="bg-red-500 text-white rounded-lg px-4 py-2">
                            Reject
                        </button>
                    </div>
                @endcan
            </div>
        @endforeach
        <div class="!fill-gray-700 text-gray-500">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
