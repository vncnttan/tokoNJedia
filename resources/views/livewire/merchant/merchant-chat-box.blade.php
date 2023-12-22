@if ($room == null && $user == null)
    <div class="p-20 w-3/4 h-full  rounded-md flex flex-col gap-2 justify-center items-center">
        <img class="w-72 h-72 object-contain" src="{{ url(asset('/assets/chat/chat.png')) }}" alt="">
        <h1 class="text-3xl text-black font-bold">Welcome To Chat</h1>
        <p class="text-md text-gray-700 font-base">Select message to start conversation</p>
    </div>
@else
    <div class="w-3/4 h-full  bg-slate-50 flex flex-col justify-start items-start">
        <div class="w-full sticky top-0 h-20 flex justify-start items-center p-4 gap-4 border-b-2 border-gray-100">
            <img class="w-12 h-12 object-cover rounded-full "
                 src="{{ asset($user->image) ?? asset('assets/logo/logo.png') }}"
                 alt="">
            <h1 class="text-lg font-semibold text-black">{{ $user->username ?? Auth::user()->username }}</h1>
        </div>
        <div class="w-full h-full max-h-full overflow-y-auto p-4" id="chat-container">
            @if ($messages != null)
                @foreach ($messages as $m)
                    @if ($m->Messageable->user_id == Auth::user()->id)
                        <div class="chat chat-end">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS chat bubble component"
                                         src="{{ $m->Messageable->image ? asset($m->Messageable->image) : asset('assets/logo/logo.png') }}"/>
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $m->Messageable->username }}
                            </div>
                            <div class="chat-bubble">{{ $m->message }}</div>
                            <div class="chat-footer ">
                                <time class="text-xs opacity-50">{{ $m->created_at }}</time>
                            </div>
                        </div>
                    @else
                        <div class="chat chat-start">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="Tailwind CSS chat bubble component"
                                         src="{{ $m->Messageable->image ? asset($m->Messageable->image) : asset('assets/logo/logo.png')}}"/>
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $m->Messageable->name }}
                            </div>
                            <div class="chat-bubble">{{ $m->message }}</div>
                            <div class="chat-footer ">
                                <time class="text-xs opacity-50">{{ $m->created_at }}</time>

                            </div>
                        </div>
                    @endif
                @endforeach
                <div id="invisible-div" class="py-1"></div>
            @endif
        </div>
        <form wire:submit.prevent='send'
              class="w-full sticky bottom-0 h-20 border-t-2 border-gray-100 flex justify-center items-center gap-4 p-4">
            <label class="w-full">
                <input wire:model='message' class="input-style w-full" type="text"
                       placeholder="Send something as {{ auth()->user()->Merchant->name }} store...">
            </label>
            <button wire:click='send' class="p-2 rounded-full bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="#ffffff" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                </svg>
            </button>
        </form>
    </div>
@endif
<script type="module">
    setInterval(function () {

        const container = document.getElementById('chat-container');
        const invisibleDiv = document.getElementById('invisible-div');

        if (isElementVisibleInContainer(invisibleDiv, container)) {
            window.livewire.emit('hydrate');
        }
        // window.livewire.emit('hydrate');
    }, 1000);

    function isElementVisibleInContainer(element, container) {
        if (!element || !container) {
            return false;
        }

        const elementRect = element.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        return (
            elementRect.bottom <= containerRect.bottom &&
            elementRect.top >= containerRect.top &&
            elementRect.right <= containerRect.right &&
            elementRect.left >= containerRect.left
        );
    }


    window.addEventListener('rowChatToBottom', event => {
        const container = document.querySelector("#chat-container")
        container.scrollTop = container.scrollHeight;
    });
</script>
