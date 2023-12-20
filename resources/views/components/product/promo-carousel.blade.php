<div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-[35vh]">
        @foreach($promos as $promo)
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <a href="{{ 'deals' . '/' . $promo->id  }}">
                    <img src="{{$promo->promo_image}}"
                         class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                         alt="Promo Banner">
                </a>
            </div>
        @endforeach
    </div>

    <div class="absolute z-50 flex space-x-1 -translate-x-1/2 bottom-5 left-0 pl-24">
        <button class="w-2 h-2 rounded-full bg-gray-500" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
        <button class="w-2 h-2 rounded-full bg-gray-500" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        <button class="w-2 h-2 rounded-full bg-gray-500" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        <button class="w-2 h-2 rounded-full bg-gray-500" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
        <button class="w-2 h-2 rounded-full bg-gray-500" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
    </div>

    <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 style="fill: none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 style="fill: none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
