@extends('pages.merchant.merchant')

@section('title', 'Merchant Profile Edit')

@section('content')
    <div class="w-full h-full" id="merchant-home-screen">
        <form action="/merchant/profile" method="POST" enctype="multipart/form-data"
              class="w-full rounded-md p-12 xl:px-32 flex flex-col h-fit gap-8">
            @csrf
            @method('PATCH')
            <h1 class="text-black font-bold text-2xl">
                Edit Profile
            </h1>
            <div class="flex flex-col flex-wrap gap-8">
                {{--                    Profile --}}
                <div class="flex flex-row gap-12">

                    @livewire('upload-merchant-profile-image', ['merchant' => $merchant])
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
                                    <input type="text" name="processTime" id="procTime" placeholder="Status"
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
                    @livewire('upload-profile-banner-image', ['merchant' => $merchant])
                </div>
                <div class="flex flex-row gap-2 w-full">
                    <div class="flex w-full flex-col gap-1">
                        <label for="desc">Description</label>
                        <input type="text" name="desc" id="desc" placeholder="Description"
                               value="{{ $merchant->description }}"
                               class="border border-gray-300 rounded-md p-2 w-full"/>
                    </div>
                    <div class="flex w-1/3 flex-col gap-1">
                        <label for="catchphrase">Catchphrase</label>
                        <input type="text" name="catchphrase" id="catchphrase" placeholder="ex. Thrive for the better"
                               value="{{ $merchant->catch_phrase }}"
                               class="border border-gray-300 rounded-md p-2 w-full"/>
                    </div>
                </div>
                <div class="flex w-full flex-col gap-1">
                    <label for="fullDescription">About store</label>
                    <textarea type="text" name="fullDescription" id="fullDescription"
                              placeholder="Tell your customer all about your store here"
                              value="{{ $merchant->full_description }}"
                              class="border border-gray-300 rounded-md p-2 w-full h-52"></textarea>
                </div>
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <a href="/merchant/"
                   class="bg-red-500 px-6 py-4 text-white font-semibold rounded-md flex flex-row gap-2 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Discard Changes
                </a>
                <button type="submit"
                        class="!bg-green-500 px-6 py-4 text-white font-semibold rounded-md flex flex-row gap-2 place-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" data-slot="icon" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                    </svg>
                    Edit Profile
                </button>
            </div>
        </form>
    </div>
@endsection
