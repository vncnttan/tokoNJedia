<div class="w-full flex flex-col gap-4">
    <div class="w-full flex gap-2 place-items-center box-border">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             class="w-6 h-6 icon-size">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <h1 class="text-2xl font-semibold text-black">{{ Auth::user()->username }}</h1>
    </div>

    <div class="flex-grow w-full rounded-lg border-[1px] border-gray-200 bg-white">
        <div class="w-full h-full p-4 box-border flex flex-col justify-start items-start gap-4">
            @if($transactionDetails->count() == 0)
                <div class="w-full flex flex-col justify-center items-center gap-4 py-12">
                    <img alt="Empty Transaction" src="{{ url(asset('assets/profile/no-history.png'))  }}"
                         class="w-auto h-64">
                    <div class="flex flex-col gap-1 place-items-center">
                        <h1 class="text-2xl font-bold ">
                            You don't have any transaction yet
                        </h1>
                        <h5 class="text-base text-gray-700">
                            Start checkout items in your cart to start transactions
                        </h5>
                    </div>

                    <a href="/cart">
                        <button class="bg-green-600 py-2 px-16 rounded-md text-white font-bold">
                            Shop Now
                        </button>
                    </a>
                </div>
            @endif
            @foreach($transactionDetails as $t)
                @if($t->electric_token == null)
                    <div class="rounded-md flex flex-col p-6 border-gray-500 border-2 border-opacity-10 gap-4 w-full">
                        <div class="flex flex-row place-items-center gap-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                            <div class="font-semibold">
                                Shopping
                            </div>
                            <div>
                                {{ $t->transactionHeader->created_at->format('d M Y') }}
                            </div>
                            <div class="hidden lg:block">
                                {{ $t->transactionHeader->created_at->format('H:i') }}
                            </div>
                            <div
                                class="
                                    {{ $t->status == 'Pending' ? 'bg-amber-300 text-amber-600' : '' }}
                                    {{ $t->status == 'Shipping' ? 'bg-blue-300 text-blue-600' : '' }}
                                    {{ $t->status == 'Rejected' ? 'bg-red-300 text-red-600' : '' }}
                                    {{ $t->status == 'Completed' ? 'bg-green-300 text-green-600' : '' }}
                                     px-2 rounded-sm">
                                {{ $t->status }}
                            </div>


                            <div class="text-gray-500 hidden lg:block">
                                {{ $t->transactionHeader->id }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <a href="/merchant/{{ $t->product->merchant->id }}" class="font-bold">
                                {{ $t->product->merchant->name }}
                            </a>

                            <a href="/product-detail/{{ $t->product->id }}"
                               class="flex flex-col lg:flex-row justify-between">
                                <div class="flex flex-row gap-4">
                                    <img alt="Product Image"
                                         src="{{ asset($t->product->productImages->first()->image) }}"
                                         class="w-16 h-16 rounded-md">
                                    <div class="flex flex-col justify-center">
                                        <div class="flex flex-row gap-2 place-items-center">
                                            <div class="font-semibold">
                                                {{ $t->product->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $t->productVariant->name }}
                                            </div>
                                        </div>
                                        <div class="text-gray-500">
                                            {{ $t->quantity }} pcs x Rp{{ formatPrice($t->price) }}
                                        </div>
                                        <div class="flex flex-row gap-1 place-items-center">
                                            @if($t->discount > 1)
                                                <span class="line-through text-gray-400 text-xs">
                                                Rp {{ formatPrice($t->price) }}
                                            </span>
                                                <span
                                                    class="text-xs text-gray-500 bg-gray-100 p-0.5 rounded-md font-bold">{{ $t->discount }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="lg:px-8 h-fit mr-6 flex flex-col justify-center place-items-start border-gray-500 border-opacity-30 lg:border-l-[1px]">
                                    <div class="text-gray-500">
                                        Total Price
                                    </div>
                                    <div class="font-bold">
                                        Rp. {{ formatPrice($t->total_paid )}}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="w-full text-end">
                            @if($t->status == 'Pending')
                                <a href="/chat/{{ $t->product->merchant->id }}"
                                   class="bg-green-600 hover:bg-green-700 py-2 px-12 text-white rounded-md font-bold">
                                    Chat Seller
                                </a>
                            @elseif($t->status == 'Shipping')
                                Already received the product?

                                <button
                                    onclick="onConfirmReceived('{{ $t->transactionHeader->id }}', '{{ $t->product->id }}', '{{ $t->productVariant->id }}')"
                                    class="ml-4 bg-white hover:bg-gray-100 border-[1px] text-green-600 border-green-600 py-2 px-12 rounded-md font-bold">
                                    Confirm Received
                                </button>
                            @elseif($t->status == 'Completed')
                                <div class="justify-end flex flex-row gap-2">
                                    @can('review-product', [$t->transactionHeader->id, $t->product->id])
                                        <a
                                            href="/review/{{ $t->transactionHeader->id }}/{{ $t->product->id }}"
                                            class="ml-4 bg-white hover:bg-gray-100 border-[1px] text-green-600 border-green-600 py-2 px-12 rounded-md font-bold">
                                            Give Reviews
                                        </a>
                                    @endcan
                                    <a href="/product-detail/{{ $t->product->id }}"
                                       class="bg-green-600 hover:bg-green-700 py-2 px-12 text-white rounded-md font-bold">
                                        Buy Again
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @else

                    <div class="rounded-md flex flex-col p-6 border-gray-500 border-2 border-opacity-10 gap-4 w-full">
                        <div class="flex flex-row place-items-center gap-2 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
                            </svg>

                            <div class="font-semibold">
                                Top up & Billing
                            </div>
                            <div>
                                {{ $t->transactionHeader->created_at->format('d M Y') }}
                            </div>
                            <div class="hidden lg:block">
                                {{ $t->transactionHeader->created_at->format('H:i') }}
                            </div>
                            <div
                                class="bg-green-300 text-green-600 px-2 rounded-sm">
                                Completed
                            </div>


                            <div class="text-gray-500 hidden lg:block">
                                {{ $t->transactionHeader->id }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <a href="/" class="font-bold">
                                Electrical Bill
                            </a>

                            <a href="/"
                               class="flex flex-col lg:flex-row justify-between">
                                <div class="flex flex-row gap-4">
                                    <img alt="Product Image"
                                         src="{{ asset('assets/logo/electric.jpg') }}"
                                         class="w-16 h-16 rounded-md">
                                    <div class="flex flex-col justify-center">
                                        <div class="flex flex-row gap-2 place-items-center">
                                            <div class="font-semibold">
                                                Electric Token
                                            </div>
                                        </div>
                                        <div class="text-gray-700">
                                            Token: {{ $t->electric_token }}
                                        </div>
                                        <div class="text-gray-500">
                                            Rp. {{ formatPrice($t->nominal) }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="lg:px-8 h-fit mr-6 flex flex-col justify-center place-items-start border-gray-500 border-opacity-30 lg:border-l-[1px]">
                                    <div class="text-gray-500">
                                        Total Price
                                    </div>
                                    <div class="font-bold">
                                        Rp. {{ formatPrice($t->nominal)}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="w-full justify-end">
                {{ $transactionDetails->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    function onConfirmReceived(transaction_id, product_id, variant_id) {
        let data = {
            transaction_id: transaction_id,
            product_id: product_id,
            variant_id: variant_id,
            _token: "{{ csrf_token() }}"
        }
        fetch('/transaction/shipment-done', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(() => {
                window.location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
            })

    }
</script>
