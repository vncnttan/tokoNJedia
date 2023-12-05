<div class="hoverable-carousel mb-10 z-10">
    <div id="default-carousel" class="relative" data-carousel="static" data-carousel-animation="fade">
        <div class="relative md:h-96 md:w-96 h-64 w-64 overflow-hidden rounded-lg ">
            @foreach($productImages as $image)
                <div class="image-view duration-0 ease-in-out w-full h-full" {{ count($productImages) >= 2 ? "data-carousel-item": ""}}>
                    <img src="{{$image->image}}"
                         alt="Image Thumbnail"
                    class="h-full w-full object-cover">
                </div>
            @endforeach
        </div>


        <div class="absolute flex space-x-2 bottom-[-45px] md:bottom-[-80px] left-0">
            @foreach($productImages as $image)
                <button type="button"
                        id="carousel-button-{{$loop->index}}"
                        class="w-10 h-10 md:w-16 md:h-16 rounded-lg carousel-button border"
                        aria-current="true"
                        aria-label="{{ $image->id }}"
                        data-carousel-slide-to="{{$loop->index}}">
                    <img src="{{$image->image}}"
                         alt="Image Thumbnail"
                         class="w-full h-full object-cover rounded-md"
                    >
                </button>
            @endforeach

        </div>

        <button type="button"
                class="absolute hidden top-0 left-0 z-30 items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
        </button>
        <button type="button"
                class="absolute top-0 hidden right-0 z-30 items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
        </button>
    </div>
</div>

<script>
    const buttons = document.querySelectorAll('.carousel-button');
    const carousel = document.querySelector('[data-carousel="static"]');
    let lastHoveredButton = null;

    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            const index = parseInt(button.getAttribute('data-carousel-slide-to'));

            if (lastHoveredButton) {
                lastHoveredButton.classList.remove('border-2');
                lastHoveredButton.classList.remove('border-green-500');
            }

            button.click();

            buttons.forEach(b => {
                b.setAttribute('aria-current', 'false');
            });
            button.setAttribute('aria-current', 'true');

            button.classList.add('border-2', 'border-green-500');
            lastHoveredButton = button;

            const carouselItem = carousel.querySelector('[data-carousel-item]:nth-child(' + (index + 1) + ')');
            console.log(carouselItem)
            carouselItem.parentNode.prepend(carouselItem);
        });
    });

    if (buttons.length === 1) {
        buttons[0].setAttribute('aria-current', 'true');
        buttons[0].classList.add('border-2', 'border-green-500');
        document.getElementsByClassName("image-view")[0].classList.remove("hidden");
        document.getElementsByClassName("image-view")[0].classList.remove("translate-x-full");
        document.getElementsByClassName("image-view")[0].classList.add("translate-x-0");
    }
</script>


