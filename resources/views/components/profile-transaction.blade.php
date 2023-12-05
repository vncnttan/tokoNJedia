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
            @foreach($transactions as $transaction)
                @foreach($transaction->transactionDetails as $t)
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
                                {{ $transaction->created_at->format('d M Y') }}
                            </div>
                            <div>
                                {{ $transaction->created_at->format('H:i') }}
                            </div>
                            <div
                                class="{{ $t->status == 'Pending' ? 'bg-amber-300 text-amber-600' : '' }} px-2 rounded-sm">
                                {{ $t->status }}
                            </div>
                            <div class="text-gray-500">
                                {{ $transaction->id }}
                            </div>
                        </div>
                        <div class="flex flex-col gap-4">
                            <a href="merchant/{{ $t->product->merchant->id }}" class="font-bold">
                                {{ $t->product->merchant->name }}
                            </a>
                            <div class="flex flex-row justify-between">
                                <div class="flex flex-row gap-4">
                                    <img alt="Product Image"
                                         src="{{ asset($t->product->productImages->first()->image) }}"
                                         class="w-16 h-16 rounded-md">
                                    <div class="flex flex-col justify-center">
                                        <div class="font-semibold">
                                            {{ $t->product->name }}
                                        </div>
                                        <div class="text-gray-500">
                                            {{ $t->quantity }} pcs x Rp{{ formatPrice($t->productVariant->price) }}
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-8 h-fit mr-6 flex flex-col justify-center place-items-start border-gray-500 border-opacity-30 border-l-[1px]">
                                    <div class="text-gray-500">
                                        Total Price
                                    </div>
                                    <div class="font-bold">
                                        Rp. {{ formatPrice($t->productVariant->price + shipmentPriceCalculate(
                                                                                                $transaction->location['latitude'],
                                                                                                $transaction->location['longitude'],
                                                                                                $t->product->merchant->location->first()->latitude,
                                                                                                $t->product->merchant->location->first()->longitude,
                                                                                                $t->shipment->base_price,
                                                                                                $t->shipment->variable_price) )}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full text-end">
                            @if($t->status == 'Pending')
                                <a href="/"
                                   class="bg-green-600 hover:bg-green-700 py-2 px-12 text-white rounded-md font-bold">
                                    Chat Seller
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
