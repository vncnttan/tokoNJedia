@extends('pages.merchant.merchant')

@section('title', 'Merchant Home')

@section('content')
    <div class="w-full h-full" id="merchant-home-screen">
        <div class="w-full h-full p-10">
            <div class="bg-white p-8 rounded-md bg-opacity-80 flex flex-col gap-4">
                <h1 class="text-black font-bold text-2xl">
                    Pending Orders
                </h1>
                <div class="flex flex-row flex-wrap gap-4">
                    @foreach($pendingOrders as $pending)
                        <div class="w-96 bg-white p-4 rounded-md flex flex-col gap-4">
                            <div class="flex flex-row gap-4 place-items-center">
                                <div class="font-semibold text-sm">
                                    {{ $pending->transactionHeader->user->username }}
                                </div>
                                <div class="flex flex-row gap-1">
                                    <div class="text-xs">
                                        {{ $pending->transactionHeader->created_at->format('d M Y') }}
                                    </div>
                                    <div class="text-xs">
                                        {{ $pending->transactionHeader->created_at->format('H:m') }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row gap-4">
                                <img alt="Product Image"
                                     src="{{ asset($pending->product->productImages->first()->image) }}"
                                     class="w-16 h-16 rounded-md">
                                <div class="flex flex-col justify-center">
                                    <div class="font-semibold">
                                        {{ $pending->product->name }}
                                    </div>
                                    <div class="text-gray-500 text-xs">
                                        {{ $pending->productVariant->name }}
                                    </div>
                                    <div class="text-gray-500 text-sm">
                                        {{ $pending->quantity }} pcs x
                                        Rp{{ formatPrice($pending->productVariant->price) }}
                                    </div>
                                </div>
                            </div>
                            <div class="justify-end flex flex-row gap-2">
                                <button
                                   class="bg-red-400 hover:bg-red-500 py-2 px-4 text-white rounded-md font-bold"
                                onclick="rejectOrder('{{$pending->transaction_id}}' , '{{$pending->variant_id}}', '{{$pending->product_id}}')">
                                    Reject Order
                                </button>
                                <button
                                   class="bg-green-600 hover:bg-green-700 py-2 px-4 text-white rounded-md font-bold"
                                onclick="acceptOrder('{{$pending->transaction_id}}' , '{{$pending->variant_id}}', '{{$pending->product_id}}')">
                                    Accept Order
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <style>
        #merchant-home-screen {
            background-image: url('https://assets.tokopedia.net/assets-tokopedia-lite/v2/icarus/kratos/0e750897.png');
            height: calc(100vh - 112px);
        }
    </style>
    <script>

        function acceptOrder(transaction_id, variant_id, product_id)  {
            let data = {
                product_id: product_id,
                variant_id: variant_id,
                transaction_id: transaction_id,
                _token: "{{ csrf_token() }}"
            }

            fetch('/transaction/accept-order', {
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

        function rejectOrder(transaction_id, variant_id, product_id) {
            let data = {
                product_id: product_id,
                variant_id: variant_id,
                transaction_id: transaction_id,
                _token: "{{ csrf_token() }}"
            }

            fetch('/transaction/reject-order', {
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
@endsection
