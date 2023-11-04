<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    {{--    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">--}}
    <title>@yield('title')</title>
</head>
<body>
<div class="bg-white">
    <div class="min-h-screen flex flex-col justify-between items-center">
            @include('components.navbar')
        @yield('content')
    </div>
</div>
</body>
</html>
