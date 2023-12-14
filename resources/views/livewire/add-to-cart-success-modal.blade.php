<div class="flex flex-col gap-8 p-8">
    <div>
        <h1 class="text-2xl font-bold">
            Successfully Added to Cart
        </h1>
        <div class="w-full shadow-card my-3 rounded-md py-3 px-5 flex flex-row justify-between place-items-center"
             style="
            background-image: url('{{ asset('assets/checkout/checkout-bg.png') }}');
            background-repeat: no-repeat;
            background-position: right;
            background-size: 50%;
         ">
            <div class="text-gray-700 font-semibold pl-5">
                {{ $product->name }}
            </div>
            <a href="/cart">
                <button class="bg-green-500 hover:bg-green-600 p-3 rounded-md text-white font-bold">
                    View Cart
                </button>
            </a>
        </div>
    </div>
    <x-recommended-product :is-infinite-scrolling="0" request-count="12" />
</div>
