@extends('pages.merchant.merchant')

@section('title', 'Merchant Home')

@section('content')
    <div class="w-full h-full" id="merchant-home-screen">
        <div class="bg-white rounded-md mx-2">
            <h1 class="text-white font-bold text-2xl">
                Pending Orders
            </h1>
        </div>
    </div>
    <style>
        #merchant-home-screen {
            background-image: url('https://assets.tokopedia.net/assets-tokopedia-lite/v2/icarus/kratos/0e750897.png');
            height:  calc(100vh - 112px);
        }
    </style>
@endsection
