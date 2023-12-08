@extends('templates.template')

@section('title', 'Review')

@section('content')
    <div class="xl:mx-80 py-12 pb-10 px-12 md:px-24 lg:px-44 xl:px-52 2xl:px-96 flex flex-col gap-6 w-full">
        <h1 class="font-bold text-3xl">
            Add Review
        </h1>
        <div class="flex flex-col gap-12 border-gray-500 rounded-xl border-opacity-10 border-2 p-12">
            <div class="flex flex-row gap-8">
                <div class="flex flex-col xl:flex-row justify-between w-full place-items-center">
                    <div class="flex flex-row gap-4 place-items-center">
                        <img src="{{ asset($transactionDetail->product->productImages[0]->image) }}" alt=""
                             class="w-40 h-40 rounded-xl object-cover">
                        <div class="flex flex-col gap-2">
                            <div class="text-sm font-gray-500">
                                {{ $transactionDetail->created_at->format('d F Y') }}
                            </div>
                            <div class="flex flex-col">
                                <div class="font-bold text-xl">
                                    {{ $transactionDetail->product->name }}
                                </div>
                                <div class="flex flex-row gap-2">
                                    Variants:
                                    @foreach($allVariantsInTransaction as $index => $v )
                                        {{ $v->name }}
                                        @if($index != count($allVariantsInTransaction) - 1)
                                            ,
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                {{ $transactionDetail->product->merchant->name }}
                            </div>
                        </div>
                    </div>
                    <div id="star-rating" class="flex flex-row gap-6">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="star" width="50" height="50" data-rating="{{ $i }}"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"/>
                            </svg>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-between items-center gap-4 flex-col xl:flex-row">
                <div class="xl:w-64 w-full flex flex-col justify-start text-start items-center gap-1 flex-wrap">
                    <h1 class="w-full text-lg text-gray-400 font-semibold">Upload Image</h1>
                    <p class="w-full">
                        File extension allowed: .JPG, .JPEG, .PNG</p>
                </div>
                @livewire('upload-product-image', ['slot' => 5])
            </div>
            <div class="w-full flex justify-between items-center gap-4 flex-col xl:flex-row">
                <div class="xl:w-64 w-full flex flex-col justify-start text-start items-center gap-1 flex-wrap">
                    <h1 class="w-full text-lg text-gray-400 font-semibold">Upload Video</h1>
                    <p class="w-full">
                        File extension allowed: .MP4, .MOV</p>
                </div>
                @livewire('upload-product-image', ['slot' => 5])
            </div>
            <div class="w-full flex justify-between items-center gap-4 flex-col xl:flex-row">
                <div class="xl:w-64 w-full flex flex-col justify-start text-start items-center gap-1 flex-wrap">
                    <h1 class="w-full text-lg text-gray-400 font-semibold">Message <span class="text-red-600">*</span> </h1>
                </div>
                <label for="message" class="w-full">
                    <textarea name="message" class="w-full p-1 h-24 border-gray-500 border-2 rounded-md border-opacity-30" placeholder="Review Message"> </textarea>
                </label>
            </div>

            <button class="p-2 bg-green-500 rounded-md text-white font-semibold">
                Insert Review
            </button>
        </div>
    </div>

    <style>
        .star {
            cursor: pointer;
            color: grey;
        }

        .star.selected {
            color: gold;
        }
    </style>

    <script>
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('mouseover', onMouseOver);
            star.addEventListener('click', onClick);
        });

        function onMouseOver(event) {
            resetStars();
            const rating = event.currentTarget.dataset.rating;
            highlightStars(rating);
        }

        function onClick(event) {
            const rating = event.currentTarget.dataset.rating;
            document.querySelectorAll('.star').forEach(star => {
                star.removeEventListener('mouseover', onMouseOver);
            });
            highlightStars(rating);
        }

        function resetStars() {
            document.querySelectorAll('.star').forEach(star => {
                star.classList.remove('selected');
            });
        }

        function highlightStars(rating) {
            document.querySelectorAll('.star').forEach(star => {
                if (star.dataset.rating <= rating) {
                    star.classList.add('selected');
                }
            });
        }
    </script>
@endsection
