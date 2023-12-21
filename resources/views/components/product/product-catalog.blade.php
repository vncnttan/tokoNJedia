<div class="flex flex-col">
    <div class="flex lg:flex-row flex-col gap-8">
        <div class="md:w-[30vw] w-[80vw] flex flex-col">
            <div class="pb-5">
                <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
                <div class="flex flex-row xl:gap-3 gap-2 place-items-center text-md">
                    <div> Sold
                        <span class="text-gray-500"> {{ $product->sold ?  : 0 }} </span>
                    </div>
                    •
                    <div class="flex flex-row place-items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"
                             class="inline fill-yellow-400">
                            <path
                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                        </svg>
                        <span>{{ $product->average_review }}</span>
                        <span class="text-gray-500"> ({{ $product->review_count }} review) </span>
                    </div>
{{--                    •--}}
{{--                    <div class="flex flex-row place-items-center gap-1.5">--}}
{{--                        Discussion--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="flex flex-col gap-2">
                @if ($productPromo != null || $flashSalePromo != null)
                    <div class="text-4xl font-bold">
                        Rp<span id="priceAfterDiscountTextDisplay"></span>
                    </div>
                    <div class="flex gap-1 items-center">
                        <div class="text-xs flex items-center bg-red-200 p-1 text-red-600 font-bold rounded">
                            <span id="discountTextDisplay"></span>
                        </div>
                        <div class="text-promo font-medium text-md line-through text-gray-400 flex items-center">
                            Rp<span id="priceTextDisplay"></span>
                        </div>
                    </div>
                @else
                    <div class="text-4xl font-bold">
                        Rp<span id="priceTextDisplay"></span>
                    </div>
                @endif
            </div>
            <div class="border-y-2 py-4 border-gray-50 flex flex-col gap-4 mt-4">
                <div class="font-bold text-lg">
                    Choose Variant: <span id="variantTextDisplay" class="font-semibold text-gray-500"></span>
                </div>

                <div class="flex flex-row flex-wrap gap-1">
                    @foreach($product->productVariants as $index => $variant)
                        <button
                            id="variant_{{ $variant->id }}"
                            class="variant-button {{ $index === 0 ? 'active' : '' }} py-2 px-4 rounded-2xl border-[1px] text-gray-500 hover:text-green-600 hover:border-green-600"
                            onclick="updateVariantDisplay('{{ $variant->id }}', '{{ $variant->name }}', '{{ $variant->price }}', this, '{{ $variant->stock }}')">
                            {{ $variant->name }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="border-gray-50 pb-2 border-b-2">
                <div class="font-bold border-b-2 border-gray-50">
                    <div class="py-3 px-6 text-green-500 border-b-2 border-green-500 w-fit">
                        Detail
                    </div>
                </div>
                <div class="text-black pt-2 flex flex-col gap-2">
                    <div>
                        <span class="text-gray-600">Condition: </span> Used
                    </div>
                    {{ $product->description }}
                </div>
            </div>
            <div class="py-4 border-gray-50 border-b-2">
                <a class="" href="/merchant/{{ $product->merchant->id }}">

                    <div class="flex flex-row gap-4">
                        <img src="{{ $product->merchant->image ?? asset('assets/logo/logo.png') }}" alt="Merchant"
                             class="w-16 h-16 rounded-full">
                        <div class="w-3/4">
                            <div class="text-lg font-bold">
                                {{ $product->merchant->name }}
                            </div>
                            <form action="/follow" method="POST">
                                @csrf
                                <input type="hidden" name="merchant_id" value="{{ $product->merchant->id }}">
                                <button type="submit"
                                    class="text-green-500 py-0.5 px-4 mt-2 w-fit border-2 font-semibold rounded-md border-green-400">
                                    @if($following)
                                        <div class="flex flex-row gap-1 place-items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            Unfollow
                                        </div>
                                    @else
                                        Follow
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            </div>
            <div class="py-8">
                <x-review-section :productId="$product->id"/>
            </div>
        </div>
        <div class="h-50vh relative">
            <div class="sticky h-fit right-0 w-80 top-[140px] flex flex-col gap-5 float-left">
                @if ($productPromo != null)
                    <div class="rounded-xl py-3 px-4 text-white font-bold" style="background: linear-gradient(90deg,#007248 0%,#09ab67 100%)">
                        {{ $productPromo->Promo->promo_name }}
                    </div>
                @elseif ($flashSalePromo != null)
                    <div class="rounded-xl py-3 px-4 text-white font-bold" style="background: linear-gradient(90deg,#007248 0%,#09ab67 100%)">
                        Flash Sale
                    </div>
                @endif
                <div class="rounded-xl border-gray-300 border-[1px] p-4 flex flex-col gap-4">
                    <h1 class="font-bold text-lg">Atur Jumlah dan Catatan</h1>
                    <div class="flex flex-row gap-4 place-items-center">
                        <div
                            class="border-[1px] px-3 py-1 flex flex-row place-items-center gap-4 rounded-md border-gray-200">
                            <button id="subtract_btn" class="disabled:text-gray-500 text-green-600"
                                    onclick="subtractQuantity()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15"/>
                                </svg>
                            </button>
                            <span id="quantityDisplay"></span>
                            <button id="add_btn" class="disabled:text-gray-500 text-green-600" onclick="addQuantity()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </button>
                        </div>
                        <div>
                            Stock total: <span id="stockDisplay"
                                               class="text-orange-500 font-bold"> Sisa {{ $product->productVariants[0]->stock }} </span>
                        </div>
                    </div>

                    <div class="text-gray-500 text-lg place-items-end flex flex-row justify-between">
                        Subtotal
                        <div class="flex flex-col place-items-end">
                            @if ($productPromo != null || $flashSalePromo != null)
                                <div class="text-promo font-medium text-sm line-through text-gray-400">
                                    Rp<span id="checkoutOriginalPriceTextDisplay"></span>
                                </div>
                            @endif
                            <div class="text-xl font-bold text-black">
                                Rp<span id="checkoutPriceDisplay"></span>
                            </div>
                        </div>
                    </div>
                    <div class="py-3 flex flex-col gap-2">
                        <button
                            id="addToCartBtn"
                            class="w-full py-2 rounded-md bg-green-500 hover:bg-green-600 text-white font-bold disabled:bg-gray-500 disabled:text-gray-300 disabled:cursor-not-allowed disabled:opacity-80"
                            onclick="addToCart()">
                            + Add to Cart
                        </button>
                        <button
                            id="buyNowBtn"
                            onclick="buyNow()"
                            class="w-full py-2 rounded-md border-2 border-green-500 text-green-500 font-bold  disabled:border-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed disabled:opacity-80">
                            Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>

    function addToCart() {
        if (quantity > stock) {
            return
        }

        let data = {
            product_id: product_id,
            variant_id: variant_id,
            quantity: quantity,
            _token: "{{ csrf_token() }}"
        }

        console.log(data._token)

        fetch('/cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => {
                console.log(response)
                if (response.status === 419 || response.redirected) {
                    location.href = '/login';
                } else {
                    Livewire.emit('openModal', 'add-to-cart-success-modal', data)
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            })
    }


    function buyNow() {
        if (quantity > stock) {
            return
        }

        let data = {
            product_id: product_id,
            variant_id: variant_id,
            quantity: quantity,
            _token: "{{ csrf_token() }}"
        }

        console.log(data._token)

        fetch('/cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => {
                console.log(response)
                if (response.status === 419 || response.redirected) {
                    location.href = '/login';
                } else {
                    location.href = '/cart/shipment';
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            })
    }

    function subtractQuantity() {
        if (quantity > 1) {
            quantity--;
            document.getElementById("quantityDisplay").textContent = quantity.toString();
            if (quantity === 1) {
                document.getElementById("subtract_btn").disabled = true;
            }
            if (quantity === stock - 1) {
                document.getElementById("add_btn").disabled = false;
            }

            let defaultButton = document.querySelector('.variant-button.active');
            if (defaultButton) {
                defaultButton.click();
            }
        }
    }

    function addQuantity() {
        if (quantity < stock) {
            quantity++;
            document.getElementById("quantityDisplay").textContent = quantity.toString();

            if (quantity === stock) {
                document.getElementById("add_btn").disabled = true;
            }
            if (quantity === 2) {
                document.getElementById("subtract_btn").disabled = false;
            }

            let defaultButton = document.querySelector('.variant-button.active');
            if (defaultButton) {
                defaultButton.click();
            }
        }
    }

    let quantity = 1;
    let stock = {{ $product->productVariants[0]->stock }};
    let variant_id;
    let product_id = '{{ $product->id }}';
    let loggedIn = {!! json_encode((bool) $isLoggedIn) !!};
    let discount = {{ $discount ?? 0 }};

    function formatPriceJS(price) {
        return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
    }

    function updateVariantDisplay(variantID, variantName, variantPrice, clickedBtn, variantStock) {
        variant_id = variantID;
        stock = parseInt(variantStock);

        let stockDisplay = document.getElementById("stockDisplay");
        let variantTextDisplay = document.getElementById("variantTextDisplay");
        let priceTextDisplay = document.getElementById("priceTextDisplay");
        let checkoutPriceDisplay = document.getElementById("checkoutPriceDisplay");

        let checkoutOriginalPriceDisplay = null;
        let priceAfterDiscountTextDisplay = null;
        let discountTextDisplay = null;

        if (discount > 0) {
            checkoutOriginalPriceDisplay = document.getElementById("checkoutOriginalPriceTextDisplay");
            priceAfterDiscountTextDisplay = document.getElementById("priceAfterDiscountTextDisplay");
            discountTextDisplay = document.getElementById("discountTextDisplay");
        }

        stockDisplay.textContent = stock <= 0 ? "Out stock" : stock < 10 ? "Sisa " + stock : stock;
        stockDisplay.classList.toggle('text-orange-500', stock <= 10);
        stockDisplay.classList.toggle('text-black-500', stock > 10);

        variantTextDisplay.textContent = variantName;
        priceTextDisplay.textContent = formatPriceJS(variantPrice);
        checkoutPriceDisplay.textContent = formatPriceJS(`${variantPrice * quantity}`);

        if (discount > 0) {
            const discountedPriceValue = Math.ceil(variantPrice - (variantPrice * (discount / 100)));
            checkoutPriceDisplay.textContent = formatPriceJS(`${discountedPriceValue * quantity}`);
            checkoutOriginalPriceDisplay.textContent = formatPriceJS(variantPrice);
            priceAfterDiscountTextDisplay.textContent = formatPriceJS(`${discountedPriceValue}`);
            discountTextDisplay.textContent = discount + '%';
        }

        document.querySelectorAll('.variant-button').forEach(button => {
            button.classList.toggle('border-green-600', button === clickedBtn);
            button.classList.toggle('text-green-600', button === clickedBtn);
            button.classList.toggle('bg-green-100', button === clickedBtn);
            button.classList.toggle('border-gray-500', button !== clickedBtn);
            button.classList.toggle('text-gray-500', button !== clickedBtn);
            button.classList.toggle('active', button === clickedBtn);
        });

        let isStockAvailable = stock > 0;
        ["add_btn", "subtract_btn", "addToCartBtn", "buyNowBtn"].forEach(id => {
            document.getElementById(id).disabled = !isStockAvailable;
        });
    }

    window.onload = function () {
        document.getElementById("quantityDisplay").textContent = quantity;
        let defaultButton = document.querySelector('.variant-button');
        if (defaultButton) {
            defaultButton.click();
        }
    };
</script>
