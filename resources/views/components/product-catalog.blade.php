<div class="w-[30vw] flex flex-col gap-5">
    <div>
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <div class="flex flex-row gap-3 place-items-center text-md">
            <div> Terjual
                <span class="text-gray-500"> {{ $product->sold ?  : 0 }} </span>
            </div>
            •
            <div class="flex flex-row place-items-center gap-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="inline">
                    <style>svg {
                            fill: #ffc800
                        }</style>
                    <path
                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                </svg>
                <span>{{ $product->average_rating }}</span>
                <span class="text-gray-500"> ({{ $product->rating_count }} rating) </span>
            </div>
            •
            <div class="flex flex-row place-items-center gap-1.5">
                Diskusi
            </div>
        </div>
    </div>
    <div>
        <div class="text-4xl font-bold">
            Rp <span id="priceTextDisplay"></span>
        </div>
    </div>
    <div class="py-6 border-y-2 border-gray-100 flex flex-col gap-4 mt-4">
        <div class="font-bold text-lg">
            Pilih Variant: <span id="variantTextDisplay" class="font-semibold text-gray-500"></span>
        </div>

        <div class="flex flex-row gap-1">
            @foreach($product->productVariants as $variant)
                <button
                    id="variant_{{ $variant->id }}"
                    class="variant-button py-2 px-4 rounded-2xl border-[1px] text-gray-500 hover:text-green-600 hover:border-green-600"
                    onclick="updateVariantDisplay('{{ $variant->name }}', '{{ $variant->price }}', this)">
                    {{ $variant->name }}
                </button>
            @endforeach
        </div>
    </div>
    {{ $product->productVariants }}

</div>


<script>
    function formatPriceJS(price) {
        return price.replace(/\d(?=(\d{3})+$)/g, '$&.');
    }

    function updateVariantDisplay(variantName, variantPrice, clickedBtn) {
        document.getElementById("variantTextDisplay").textContent = variantName;
        document.getElementById("priceTextDisplay").textContent = formatPriceJS(variantPrice);

        let buttons = document.querySelectorAll('.variant-button');
        buttons.forEach(button => {
            button.classList.remove('border-green-600');
            button.classList.remove('text-green-600');
            button.classList.remove('bg-green-100');
            button.classList.add('border-gray-500');
            button.classList.add('text-gray-500');
        })

        clickedBtn.classList.remove('border-gray-500');
        clickedBtn.classList.remove('text-gray-500');
        clickedBtn.classList.add('border-green-600');
        clickedBtn.classList.add('bg-green-100');
        clickedBtn.classList.add('text-green-600');
    }

    window.onload = function() {
        let defaultButton = document.querySelector('.variant-button');
        if (defaultButton) {
            defaultButton.click();
        }
    };
</script>
