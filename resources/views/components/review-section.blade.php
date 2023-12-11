<div class="flex flex-col gap-6">
    <div class="flex flex-col gap-2">

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
            @foreach($recommendedVideos as $video)
                <a href="{{ $video->video }}" target="_blank">
                    <div class="h-24 w-24 bg-gray-200 rounded-lg border-gray-500 border border-opacity-30">
                        <video src="{{ $video->video }}"
                               class="w-full h-full object-cover rounded-lg"></video>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
    <div class="flex flex-col py-2">
        <div class="font-bold text-sm">
            REVIEWS
        </div>
        @foreach($reviews as $rev)
            <div class="py-4 border-opacity-30 border-b border-gray-500 flex flex-col gap-12">
                <div class="flex flex-col gap-4">
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
                            <img src="{{ asset($rev->user->image) }}"
                                 alt="{{$rev->user->username}} Profile Picture Image"
                                 class="rounded-full h-8 w-8"/>
                            <div class="font-semibold">
                                {{ $rev->user->username }}
                            </div>
                        </div>
                        <div class="flex flex-row gap-2">
                            @if($rev->ratingImages)
                                @foreach($rev->ratingImages as $image)
                                    <a href="{{ $image->image }}" target="_blank">
                                        <div
                                            class="h-24 w-24 bg-gray-200 rounded-lg border-gray-500 border border-opacity-30">
                                            <img src="{{ $image->image }}" alt="customer review image"
                                                 class="w-full h-full object-cover rounded-lg">
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                            @if($rev->ratingVideos)
                                @foreach($rev->ratingVideos as $video)
                                    <a href="{{ $video->video }}" target="_blank">
                                        <div
                                            class="h-24 w-24 bg-gray-200 rounded-lg border-gray-500 border border-opacity-30">
                                            <video src="{{ $video->video }}"
                                                   class="w-full h-full object-cover rounded-lg"></video>
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            {{ $rev->message }}
                        </div>
                    </div>
                    <div class="flex flex-col gap-4" x-data="{ showForm: false }">
                        <button @click="showForm = !showForm" class="w-full justify-end flex flex-row place-items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                            </svg>
                            See Reply
                        </button>
                        <div x-show="showForm"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="transform opacity-0"
                             x-transition:enter-end="transform opacity-100"
                             x-transition:leave="transition ease-in duration-500"
                             x-transition:leave-start="transform opacity-100"
                             x-transition:leave-end="transform opacity-0">
                            @foreach($rev->reply as $r)
                                <div>
                                    {{ $r->reply }}
                                </div>
                            @endforeach

                            @can('admin-view')
                                <form action="/reply" method="POST">
                                    @csrf
                                    <div class="flex flex-row gap-2 place-items-center">
                                        <label for="reply" class="flex-grow h-full">
                                            <input type="text" name="reply"
                                                   class="p-2 h-full border border-gray-500 rounded-lg w-full"
                                                   placeholder="Reply to this review">
                                        </label>
                                        <button class="bg-gray-500 rounded-lg text-white px-4 py-2">
                                            Reply
                                        </button>
                                    </div>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="!fill-gray-700 text-gray-500">
            {{ $reviews->links() }}
        </div>
    </div>
</div>