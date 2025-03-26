<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-[#5ce1c6] to-white min-h-screen">
    <x-partials.navbar></x-partials.navbar>
    <div class="container max-w-screen-lg mx-auto p-4 min-h-screen">

        <!-- Page Content -->
        <main>
            {{ $slot }}
            @yield('content')
        </main>
    </div>
</body>


</html>
