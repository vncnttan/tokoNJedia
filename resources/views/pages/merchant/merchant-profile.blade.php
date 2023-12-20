@extends('pages.merchant.merchant')

@section('title', 'Merchant Profile Edit')

@section('content')
    <div class="w-full h-full" id="merchant-home-screen">
        <div class="w-full rounded-md p-12 xl:px-32 flex flex-col h-fit gap-8">
            <h1 class="text-black font-bold text-2xl">
                Edit Profile
            </h1>
            <div class="flex flex-col flex-wrap gap-4">
                {{--                    Profile --}}
                <div class="flex flex-row gap-12">
                    <div class="w-48 h-48 relative">
                        <img src="{{ $merchant->image ?? asset('assets/logo/logo.png') }}" alt="{{ $merchant->name }}"
                             class="rounded-full object-cover border border-gray-300 w-full h-full">
                        <div class=" absolute bottom-0 right-0 p-2 bg-gray-300 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" data-slot="icon" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between flex-grow">
                        <div class="flex flex-col justify-center gap-4">
                            <div class="flex flex-col gap-2">
                                <label for="name">Merchant Name</label>
                                <input type="text" name="name" id="name" placeholder="Name"
                                       value="{{ $merchant->name }}"
                                       class="border border-gray-300 rounded-md p-2 w-96
                                   text-2xl font-bold"/>
                            </div>
                            <div class="flex flex-row gap-2 w-full">
                                <div class="flex flex-col gap-1">
                                    <label for="procTime">Process Time</label>
                                    <input type="text" name="Process Time" id="procTime" placeholder="Status"
                                           value="{{ $merchant->process_time }}"
                                           class="border border-gray-300 rounded-md p-2 w-48"
                                    />
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="operationalTime">Operational Time</label>
                                    <input type="text" name="operationalTime" id="operationalTime" placeholder="Status"
                                           value="{{ $merchant->operational_time }}"
                                           class="border border-gray-300 rounded-md p-2 w-96"/>
                                </div>
                                <div class="flex flex-col gap-1 flex-grow">
                                    <label for="status">Status</label>
                                    <div class="border border-gray-300 rounded-md">
                                        <select name="status" id="status"
                                                class="border-white p-2 w-full border-r-8 rounded-md">
                                            <option
                                                value="Online" {{ $merchant->status == 'Online' ? 'selected' : '' }}>
                                                Online
                                            </option>
                                            <option
                                                value="Offline" {{ $merchant->status == 'Offline' ? 'selected' : '' }}>
                                                Offline
                                            </option>
                                            <option value="Close" {{ $merchant->status == 'Closed' ? 'selected' : '' }}>
                                                Closed
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    Banner Image
                    <div class="relative h-96 overflow-hidden rounded-lg md:h-[50vh]">
                        <img src="{{$merchant->banner_image ?? asset('assets/logo/banner-merchant.jpeg')}}"
                             class="absolute block w-full h-full object-cover"
                             alt="Merchant Banner">
                    </div>
                </div>
                {{ $merchant }}
            </div>
        </div>
    </div>
@endsection
