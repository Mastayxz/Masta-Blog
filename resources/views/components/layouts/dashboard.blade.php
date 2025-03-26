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
    <!-- Trix CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">

    <!-- Trix JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class=" bg-gradient-to-b from-[#5ce1c6] to-white min-h-screen">
        <x-partials.navigation> </x-partials.navigation>

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
                    <!-- Header text -->
                    <div class="text-xl font-semibold text-gray-800">
                        {{ $header }}
                    </div>

                    <!-- Alert Notifikasi -->
                    <div class="w-auto ml-4">
                        @if (session('success'))
                            <x-alert type="success" :message="session('success')" />
                        @endif

                        @if (session('error'))
                            <x-alert type="error" :message="session('error')" />
                        @endif

                        @if (session('warning'))
                            <x-alert type="warning" :message="session('warning')" />
                        @endif

                        @if (session('info'))
                            <x-alert type="info" :message="session('info')" />
                        @endif
                    </div>
                </div>
            </header>
        @endisset


        <!-- Page Content -->
        <main>


            {{ $slot }}
            @yield('content')
        </main>
    </div>
</body>

</html>
