@extends('pages.merchant.merchant')

@section('title', 'Chat')

@section('content')
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
                    <div class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg">
                        <div class="w-12 h-12 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{Auth::user()->image}}" alt="">
                        </div>
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-lg text-black">Shirloin</h1>
                        </div>
                    </div>
                    <div class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg">
                        <div class="w-12 h-12 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{Auth::user()->image}}" alt="">
                        </div>
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-lg text-black">Shirloin</h1>
                        </div>
                    </div>
                    <div class="w-full p-2 flex justify-start items-center gap-2 hover:bg-gray-200 rounded-lg">
                        <div class="w-12 h-12 rounded-full">
                            <img class="w-full h-full rounded-full object-cover" src="{{Auth::user()->image}}" alt="">
                        </div>
                        <div class="flex flex-col justify-start items-start">
                            <h1 class="text-lg text-black">Shirloin</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-3/4 h-full  bg-slate-50 flex flex-col justify-start items-start">
                <div class="w-full sticky top-0 h-20 flex justify-start items-center p-4 gap-4 border-b-2 border-gray-100">
                    <img class="w-12 h-12 object-cover rounded-full " src="{{Auth::user()->image}}" alt="">
                    <h1 class="text-lg font-semibold text-black">Shirloin</h1>
                </div>
                <div class="w-full h-full max-h-full overflow-y-auto p-4">
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                    <h1>test</h1>
                </div>
                <div class="w-full sticky bottom-0 h-20 border-t-2 border-gray-100 flex justify-center items-center gap-4 p-4">
                    <input class="input-style w-full" type="text">
                    <button class="p-2 rounded-full bg-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                          </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>


@endsection
