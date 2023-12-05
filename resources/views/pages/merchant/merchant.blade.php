<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <title>@yield('title') | Merchant</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/x-icon" sizes="144x144" href="{{ url(asset('/assets/logo/favicon-notif.ico')) }}">
</head>

<body>
    <div class="min-h-screen min-w-screen flex flex-col items-center justify-start bg-white">
        <x-navbar />
        <div class="w-full h-full flex justify-center items-start" x-data="{ selectedTab: 'home' }">
            @include('components.merchant.merchant-sidebar')
            <div id="content" class="w-full h-full ml-60 ">
                @yield('content')
            </div>
        </div>
    </div>
    @livewire('livewire-ui-modal')
    @livewireScripts

    <style>
        #content {
            min-height: calc(100vh - 112px);
        }
    </style>

</body>

</html>
