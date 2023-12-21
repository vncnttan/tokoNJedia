<div class="flex flex-col gap-5">
    <h1 class="text-4xl font-bold">Recommended for you</h1>
    <div id="product-container" class="flex flex-wrap gap-3">
        @foreach($recommendedProducts as $product)
            <x-product-card
                :productId="$product->id"
                :productPromoId="getMaximumPromo($product->id)"
                :flashSalePromoId="getMaximumPromo($product->id)"
            />
        @endforeach
    </div>
    <div class="flex flex-row flex-wrap gap-3">
        @for($i = 0; $i < $requestCount / 2; $i++ )
            <div role="status"
                 class="loading-card space-y-8 animate-pulse md:space-y-0 md:space-x-8 rtl:space-x-reverse md:flex md:items-center">
                <div
                    class="flex items-center justify-center w-36 h-96 md:w-48 md:h-80 bg-gray-300 rounded dark:bg-gray-700">
                </div>
            </div>
        @endfor
    </div>
</div>

<script>
    function hideLoadingPlaceholder() {
        let elements = document.getElementsByClassName('loading-card');
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.display = 'none';
        }
    }

    function showLoadingPlaceholder() {
        let elements = document.getElementsByClassName('loading-card');
        for (let i = 0; i < elements.length; i++) {
            elements[i].style.display = 'flex';
        }
    }

    hideLoadingPlaceholder()

    document.addEventListener("DOMContentLoaded", function () {
        if (!{{ $isInfiniteScrolling }}) {
            hideLoadingPlaceholder()
            return;
        }

        let loading = false;
        hideLoadingPlaceholder()

        window.addEventListener("scroll", function () {
            if (
                window.scrollY + window.innerHeight >=
                document.documentElement.scrollHeight - 100 &&
                !loading
            ) {
                loading = true;
                showLoadingPlaceholder()

                let requestCount = parseInt("{{ $requestCount }}");
                fetch(`/lazy-load/${requestCount}`, {
                    method: "GET",
                })
                    .then((response) => response.text())
                    .then((html) => {
                        loading = false;

                        document.getElementById("product-container").innerHTML += html;
                        hideLoadingPlaceholder()
                        requestCount += 6;
                    })
                    .catch((error) => {
                        console.error("Error fetching data:", error);
                        loading = false;
                        hideLoadingPlaceholder()
                    });
            }
        });
    });

</script>

