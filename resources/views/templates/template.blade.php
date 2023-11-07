<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="min-h-screen flex flex-col justify-between items-center">
        @include('components.navbar')
        @yield('content')
        @include('components.footer')
    </div>
    @livewire('livewire-ui-modal')
    @livewireScripts
</body>

</html>
