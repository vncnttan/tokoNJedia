<div class="w-full h-[calc(100vh-112px)]  flex justify-center items-center gap-8 p-10 box-border overflow-y-auto">
    @if ($rooms->isEmpty())
        <div class="p-20 w-full h-full flex-1 shadow-card rounded-md flex flex-col gap-2 justify-center items-center">
            <img class="w-72 h-72 object-contain" src="{{ url(asset('/assets/chat/chat.png')) }}" alt="">
            <h1 class="text-3xl text-black font-bold">Welcome To Chat</h1>
            <p class="text-md text-gray-700 font-base">Explore to start conversation</p>
            <a href="/" class="px-4 py-2 font-bold bg-green-600 rounded-md w-fit text-white ">
                See store recommendations
            </a>
        </div>
    @else
        <div class="w-full h-full shadow-card rounded-md flex justify-center items-center">
            <div class="w-1/4 h-full  flex flex-col justify-start items-start border-r-2 border-gray-100">
                <div class="w-full h-fll flex flex-col justify-start items-start gap-2 p-4">
                    <div class="w-full flex justify-between items-center">
                        <h1 class="text-xl text-black font-bold">Chats</h1>
                    </div>
                    <label class="w-full">
                        <input wire:model='search' class="w-full input-style" type="text" placeholder="Search user">
                    </label>
                </div>
                <div class="w-full h-full flex flex-col gap-1 p-2 overflow-y-auto">
                    @foreach ($rooms as $room)
                        @php
                            $merchant = $room->Merchants->firstWhere('id', '!=', auth()->id());
                        @endphp
                        <button
                            class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg cursor-pointer"
                            wire:click="getRoom('{{ $merchant->id }}')">
                            <div class="w-12 h-12 rounded-full">
                                <img class="w-full h-full rounded-full object-cover"
                                     src="{{ $merchant->image ?? asset('assets/logo/logo.png')}}"
                                     alt="">
                            </div>
                            <div class="flex flex-col justify-start items-start text-start ">
                                <h1 class="text-lg text-black">{{ $merchant->name }}</h1>
                                {{--                                <h1 class="max-w-40 w-40 text-sm text-gray-400  overflow-hidden overflow-ellipsis">{{ $room->Messages->last()->message }}</h1>--}}
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
            @livewire('chat-box', ['room' => $currRoom, 'merchant' => $currMerchant])
        </div>
    @endif
</div>
