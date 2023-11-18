@extends('templates.template')

@section('title', "$merchant->name")

@section('content')
    <div class="2xl:px-80 xl:px-48 w-full pt-6 pb-10 px-2 flex flex-col gap-20">
        <x-merchant-header :merchantId="$merchant->id"  />
        <div class="flex flex-col gap-5">
            DESCRIPTION
        </div>
    </div>
@endsection
