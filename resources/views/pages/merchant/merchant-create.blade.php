@extends('templates.template')

@section('title', 'Merchant')

@section('content')
    <div class="max-w-7xl w-full h-full flex-1 flex justify-center items-start gap-8 p-4 sm:px-6 lg:px-8">
        <div class="flex-grow w-full h-full flex justify-start items-start ">
            <div class="h-full flex flex-col justify-start items-start gap-8 text-md font-medium ">
                <div class="w-full flex justify-start items-center gap-8">
                    <img  src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/599eaa96.png" alt="">
                    <p>Open Merchant Free Without Any Fees</p>
                </div>
                <div class="w-full flex justify-start items-center gap-8">
                    <img  src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/3494fd8d.png" alt="">
                    <p>More Than 90 Millions Active Users Every Month</p>
                </div>
                <div class="w-full flex justify-start items-center gap-8">
                    <img  src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/ecc14756.png"
                        alt="">
                    <p>Reach 97% of Potential User in Indonesia</p>
                </div>
            </div>
        </div>
        <div class="flex-grow w-full rounded-lg  bg-white ring-gray-200 ring-1 p-4 box-border">
            <div class="w-full h-full flex flex-col justify-center gap-8">
                <p class="text-black text-xl font-semibold">Halo, {{ Auth::user()->username }} lets fill your merchant
                    detail</p>
                <form class="w-full flex flex-col justify-center items-start gap-4" method="POST" action="/merchant">
                    @csrf
                    <div class="w-full flex gap-6">
                        <h1 class="w-10 h-10 rounded-full p-2 text-center font-semibold text-black ring-1 ring-green-500">1
                        </h1>
                        <div class="w-full flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Phone Number</h1>
                            <label for="">Phone Number</label>
                            <input class="input-style" type="number" name="phone">
                        </div>
                    </div>
                    <div class="w-full flex gap-6">
                        <h1 class="w-10 h-10 rounded-full p-2 text-center font-semibold text-black ring-1 ring-green-500">2
                        </h1>
                        <div class="w-full flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Merchant Name</h1>
                            <label for="">Name</label>
                            <input class="input-style" type="text" name="name">
                        </div>
                    </div>
                    <div class="w-full flex gap-6">
                        <h1 class="w-10 h-10 rounded-full p-2 text-center font-semibold text-black ring-1 ring-green-500">3
                        </h1>
                        <div class="w-full flex flex-col gap-2 justify-center">
                            <h1 class="font-semibold text-2xl text-black">Enter Your Location</h1>
                            <label for="">City</label>
                            <input class="input-style" type="text" name="city">
                            <label for="">Country</label>
                            <input class="input-style" type="text" name="country">
                            <label for="">Address</label>
                            <input class="input-style" type="text" name="address">
                            <label for="">Postal Code</label>
                            <input class="input-style" type="number" name="postal_code">
                            <label for="">Notes</label>
                            <input class="input-style" type="text" name="notes">
                            <button class="my-4 w-full rounded-lg bg-green-500 text-white text-xl font-semibold p-2 box-border self-center" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
