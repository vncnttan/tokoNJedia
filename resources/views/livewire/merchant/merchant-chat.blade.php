<div class="w-full h-[calc(100vh-112px)]  flex justify-center items-center gap-8 p-10 box-border overflow-y-auto">
    {{-- <div class="p-20 w-full flex-1 shadow-card rounded-md flex flex-col gap-2 justify-center items-center">
        <img class="w-72 h-72 object-contain" src="{{ url(asset('/assets/chat/chat.png')) }}" alt="">
        <h1 class="text-3xl text-black font-bold">Welcome To Chat</h1>
        <p class="text-md text-gray-700 font-base">Select message to start conversation</p>
    </div> --}}
    <div class="w-full h-full shadow-card rounded-md flex justify-center items-center">
        <div class="w-1/4 h-full  flex flex-col justify-start items-start border-r-2 border-gray-100">
            <div class="w-full h-fll flex flex-col justify-start items-start gap-2 p-4">
                <div class="w-full flex justify-between items-center">
                    <h1 class="text-xl text-black font-bold">Chats</h1>
                </div>
                <input class="w-full input-style" type="text">
            </div>
            <div class="w-full h-full flex flex-col gap-1 p-2 overflow-y-auto">
                @foreach ($users as $user)
                    {{-- <button class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg cursor-pointer"
                    wire:click="getRoom('{{$room->users->first()->id}}')">
                        <div class="w-12 h-12 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{$room->users->first()->image }}"
                                alt="">
                        </div>
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-lg text-black">{{ $room->users->first()->username }}</h1>
                        </div>
                    </button> --}}
                    <button
                        class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg cursor-pointer"
                        wire:click="getRoom('{{ $user->id }}')">
                        <div class="w-12 h-12 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{ $user->image }}"
                                alt="">
                        </div>
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-lg text-black">{{ $user->username }}</h1>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="w-3/4 h-full  bg-slate-50 flex flex-col justify-start items-start">
            <div class="w-full sticky top-0 h-20 flex justify-start items-center p-4 gap-4 border-b-2 border-gray-100">
                <img class="w-12 h-12 object-cover rounded-full " src="{{ $currUser->image ?? Auth::user()->image }}"
                    alt="">
                <h1 class="text-lg font-semibold text-black">{{ $currUser->username ?? Auth::user()->username }}</h1>
            </div>
            <div class="w-full h-full max-h-full overflow-y-auto p-4"
            x-ref="chatContainer"
            x-data="{
                init() {
                    this.scrollBottom();
                    this.observeChat();
                },
                scrollBottom() {
                    this.$nextTick(() => this.$refs.chatContainer.scrollTop = this.$refs.chatContainer.scrollHeight);
                },
                observeChat() {
                    const observer = new MutationObserver(() => this.scrollBottom());
                    observer.observe(this.$refs.chatContainer, { childList: true });
                }
            }"
            x-init="init()"
            >
                @if($room!=null)
                    @foreach ($room->Messages as $m)
                    <div class="chat chat-end">
                        <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Tailwind CSS chat bubble component"
                                    src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                        </div>
                        <div class="chat-header">
                            {{ Auth::user()->username }}
                            <time class="text-xs opacity-50">{{$m->created_at}}</time>
                        </div>
                        <div class="chat-bubble">{{ $m->message }}</div>
                        <div class="chat-footer opacity-50">
                            Seen at 12:46
                        </div>
                    </div>
                        @if ($m->user_id == Auth::user()->id)
                        @else
                            <div class="chat chat-start">
                                <div class="chat-image avatar">
                                    <div class="w-10 rounded-full">
                                        <img alt="Tailwind CSS chat bubble component"
                                            src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                    </div>
                                </div>
                                <div class="chat-header">
                                    Obi-Wan Kenobi
                                    <time class="text-xs opacity-50">12:45</time>
                                </div>
                                <div class="chat-bubble">You were the Chosen One!</div>
                                <div class="chat-footer opacity-50">
                                    Delivered
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif

            </div>
            <div
                class="w-full sticky bottom-0 h-20 border-t-2 border-gray-100 flex justify-center items-center gap-4 p-4">
                <input wire:model='message' class="input-style w-full" type="text">
                <button class="p-2 rounded-full bg-green-500" wire:click="sendMessage">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
    <script>

        </script>

</div>
