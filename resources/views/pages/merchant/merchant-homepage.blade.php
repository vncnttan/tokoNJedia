@extends('templates.template')

@section('title', "$merchant->name")

@section('content')
    <div class="2xl:px-80 xl:px-48 w-full pt-6 pb-10 px-2 flex flex-col gap-20">
        <div
                class="flex flex-row justify-between place-items-center p-6 rounded-md border-[1px] border-gray-300 border-opacity-50">
            <div class="flex flex-row gap-4">
                <img src="{{ $merchant->image }}" alt="{{ $merchant->name }}" class="w-24 h-24 rounded-full">
                <div class="flex flex-col justify-between">
                    <div class="flex flex-col justify-center">
                        <div class="text-2xl font-bold">
                            {{ $merchant->name }}
                        </div>
                        <div class="text-gray-500 text-sm">
                            {{ $merchant->status }}
                        </div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <button class="bg-green-600 w-32 2xl:w-44 py-1.5 rounded-md text-white text-sm font-bold">
                            Follow
                        </button>
                        <button
                                class="border-green-600 text-green-600 border-[1px] w-32 2xl:w-44 py-1.5 rounded-md text-sm font-bold">
                            Chat Seller
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex-grow xl:flex-grow-0 xl:w-[35rem] flex flex-row justify-evenly place-items-center h-full">
                <div class="flex flex-col justify-center place-items-center">
                    <div class="flex flex-row gap-2 font-bold text-xl place-items-center">
                        <svg class="w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                  clip-rule="evenodd"/>
                        </svg>
                        {{ calculateMerchantRating($merchant->id) }}
                    </div>
                    <div class="text-gray-500 text-sm ">
                        Rating & Review
                    </div>
                </div>
                <div class="h-8 w-[1px] bg-gray-300"></div>
                <div class="flex flex-col justify-center place-items-center">
                    <div class="flex flex-row font-bold text-xl place-items-center">
                        ± {{ $merchant->process_time }}
                    </div>
                    <div class="text-gray-500 text-sm ">
                        Process Time
                    </div>
                </div>
                <div class="h-8 w-[1px] bg-gray-300"></div>
                <div class="flex flex-col justify-center place-items-center">
                    <div class="flex flex-row font-bold text-xl place-items-center">
                        {{ $merchant->operational_time }}
                    </div>
                    <div class="text-gray-500 text-sm ">
                        Operational Hours
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-5">
            DESCRIPTION
        </div>
    </div>
@endsection
