<div class="flex flex-col h-fit gap-5 z-0 dev
">
    <div class="flex flex-row h-fit w-full gap-6 place-items-end">
        <div class="flex flex-col h-fit">
            <h1 class="font-bold text-xl"> Flash Sale </h1>
            <h1 class="text-4xl font-bold">Chasing Old Date Discount</h1>
        </div>
        <div class="flex flex-row gap-2 place-items-end">
            <div class="text-gray-500" id="timer-text">
                Ends in
            </div>
            <div class="flex flex-row gap-1 place-items-center">
                <div
                    id="hour-count-down"
                    class="bg-red-500 w-9 h-9 rounded-md flex justify-center place-items-center text-white font-bold ">
                    12
                </div>
                :
                <div
                    id="minute-count-down"
                    class="bg-red-500 w-9 h-9 rounded-md flex justify-center place-items-center text-white font-bold ">
                    12
                </div>
                :
                <div
                    id="second-count-down"
                    class="bg-red-500 w-9 h-9 rounded-md flex justify-center place-items-center text-white font-bold ">
                    12
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row h-fit w-full gap-2">
        <div class="flex flex-row gap-3 relative place-items-center">
            <div class="w-52 z-10 h-full place-items-start hidden md:flex flex-col pl-12">
                <img src="{{ asset('assets/general/flash-sale.webp') }}" alt="flash-sale" class="w-full h-auto"/>
            </div>
            <div class="md:my-8 flex flex-row flex-wrap gap-3 relative place-items-start">

                @foreach($flashSaleProduct as $product)
                    <x-product-card :productId="$product->id" :flashSalePromoId="getFlashSaleProductId($product->id)" />
                @endforeach
            </div>
            <div class="hidden md:block absolute bg-green-200 left-0 rounded-xl w-80 h-full"></div>
        </div>
    </div>
</div>
<script>
    const currentDate = new Date()
    const startTime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 22, 0, 0).getTime();
    const endTime = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate(), 24, 0, 0).getTime();

    function updateCountdown() {
        const currentTime = new Date().getTime();
        let timeDifference;

        if(currentTime > startTime && currentTime < endTime) {
            timeDifference = endTime - currentTime;
            document.getElementById('hour-count-down').classList.add('bg-red-500');
            document.getElementById('minute-count-down').classList.add('bg-red-500');
            document.getElementById('second-count-down').classList.add('bg-red-500');
            document.getElementById('hour-count-down').classList.remove('bg-gray-400');
            document.getElementById('minute-count-down').classList.remove('bg-gray-400');
            document.getElementById('second-count-down').classList.remove('bg-gray-400');
            document.getElementById('timer-text').innerHTML = "Ends in"
        } else {
            timeDifference = startTime - currentTime;
            document.getElementById('timer-text').innerHTML = "Starts in"
            document.getElementById('hour-count-down').classList.add('bg-gray-400');
            document.getElementById('minute-count-down').classList.add('bg-gray-400');
            document.getElementById('second-count-down').classList.add('bg-gray-400');
            document.getElementById('hour-count-down').classList.remove('bg-red-500');
            document.getElementById('minute-count-down').classList.remove('bg-red-500');
            document.getElementById('second-count-down').classList.remove('bg-red-500');
        }

        if (timeDifference > 0) {
            const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

            document.getElementById('hour-count-down').innerHTML = hours.toString().padStart(2, '0');
            document.getElementById('minute-count-down').innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById('second-count-down').innerHTML = seconds.toString().padStart(2, '0');

            setTimeout(updateCountdown, 1000);
        } else {
            document.getElementById('countdown').innerHTML = "Sale has ended!";
        }
    }

    updateCountdown();
</script>
