@extends('pages.merchant.merchant')

@section('title', 'Merchant Transaction')

@section('content')
    <div class="w-full h-full" id="merchant-home-screen">
        <div class="w-full p-10 flex flex-col h-fit gap-4">
            <div class="p-8 rounded-md flex flex-col gap-4">
                <h1 class="text-black font-bold text-2xl">
                    Transaction History
                </h1>
                <div class="flex flex-row flex-wrap gap-4">
                    @if($historyTransaction->count() < 1)
                        <div class="w-full h-full py-2 flex flex-col gap-2 justify-center place-items-center">
                            <img alt="Placeholder" src="{{ url(asset('assets/merchants/no-pending.png')) }}"
                                 class="w-auto h-64">
                            <div class="text-black font-bold text-3xl">
                                No History Transaction
                            </div>
                            <div class="text-black text-base">
                                Complete orders to see transaction histories
                            </div>
                        </div>
                    @endif
                    @foreach($historyTransaction as $t)
                        <div
                            class="rounded-md flex flex-col p-6 border-gray-500 border-2 border-opacity-10 gap-4 w-full">
                            <div class="flex flex-row place-items-center gap-2 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
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
                                                {{ $t->quantity }} pcs x Rp{{ formatPrice($t->productVariant->price) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="lg:px-8 h-fit mr-6 flex flex-col justify-center place-items-start border-gray-500 border-opacity-30 lg:border-l-[1px]">
                                        <div class="text-gray-500">
                                            Total Price
                                        </div>
                                        <div class="font-bold">
                                            Rp. {{ formatPrice($t->productVariant->price * $t->quantity + shipmentPriceCalculate(
                                                                                                $t->transactionHeader->location['latitude'],
                                                                                                $t->transactionHeader->location['longitude'],
                                                                                                $t->product->merchant->location->first()->latitude,
                                                                                                $t->product->merchant->location->first()->longitude,
                                                                                                $t->shipment->base_price,
                                                                                                $t->shipment->variable_price) )}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="w-full text-end">
                                <div class="justify-end flex flex-row gap-2">
                                    <a href="/product-detail/{{ $t->product->id }}"
                                        class="ml-4 bg-white hover:bg-gray-100 border-[1px] text-green-600 border-green-600 py-2 px-12 rounded-md font-bold">
                                        See Reviews
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
