@extends('templates.template')

@section('title', 'Chat')

@section('content')
    @livewire('chat', ['room' => $room])
@endsection

@section('footer')

@endsection
