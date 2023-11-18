<div class="w-full h-full rounded-lg shadow-card gap-10 flex flex-col lg:flex-row py-6 px-20 my-6 mb-10">
    <img alt="Not found" src="{{ url(asset('assets/checkout/not-found.png')) }}"
         class="h-32 w-fit"/>
    <div class="flex flex-col justify-evenly  gap-4">
        <div class="flex flex-col gap-2">
            <h1 class="font-semibold opacity-80 text-2xl">
                Oops, we think it hides somewhere
            </h1>
            <h4>
                Try another keyword or check product recommendation below.
            </h4>
        </div>
        <a class="w-full" href="/">
            <button
                class="w-fit h-fit py-3 px-6 rounded-lg text-sm font-semibold text-white bg-green-600">
                Go back home
            </button>
        </a>
    </div>
</div>
