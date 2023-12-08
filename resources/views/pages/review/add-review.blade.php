@extends('templates.template')

@section('title', 'Review')

@section('content')
    <div class="xl:mx-80 mt-6 mb-10 mx-2 flex flex-col gap-10">
        <div class="flex flex-col gap-5">
            <div class="border-2 border-gray-500 border-opacity-10 p-4 flex flex-row gap-8 rounded-xl">
                <div class="xl:flex hidden flex-col gap-6">
                    {{ $transactionDetail }}
                </div>
            </div>
        </div>
    </div>
@endsection
