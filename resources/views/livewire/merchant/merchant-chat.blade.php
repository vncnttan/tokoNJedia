<div class="w-full h-[calc(100vh-112px)]  flex justify-center items-center gap-8 p-10 box-border overflow-y-auto">
    @if ($rooms->isEmpty())
        <div class="p-20 w-full h-full flex-1 shadow-card rounded-md flex flex-col gap-2 justify-center items-center">
            <img class="w-72 h-72 object-contain" src="{{ url(asset('/assets/chat/chat.png')) }}" alt="">
            <h1 class="text-3xl text-black font-bold">Welcome To Chat</h1>
            <p class="text-md text-gray-700 font-base">No one has chat your store yet!</p>
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
                            $user = $room->Users->first();
                        @endphp
                        <button
                            class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg cursor-pointer"
                            wire:click="getRoom('{{ $user->id }}')">
                            <div class="w-12 h-12 rounded-full">
                                <img class="w-full h-full rounded-full object-cover"
                                     src="{{ asset($user->image) ?? asset('assets/logo/logo.png') }}"
                                     alt="">
                            </div>
                            <div class="w-full flex flex-col justify-start items-start  text-start ">
                                <h1 class="text-lg text-black">{{ $user->username }}</h1>
                                <h1 class="max-w-40 w-40 text-sm text-gray-400  overflow-hidden overflow-ellipsis">{{ $room->Messages->last()->message }}</h1>
                            </div>
                        </button>
                    @endforeach
                </div>
            </div>
            @livewire('merchant-chat-box', ['room' => $currRoom, 'user' => $currUser])
        </div>
    @endif
</div>
