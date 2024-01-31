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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        @font-face {
            font-family: "Jumper";
            src: url("{{ asset('fonts/JumperPERSONALUSEONLY-Regular.ttf') }}");
        }

        @font-face {
            font-family: "Arial";
            src: url("{{ asset('fonts/ARIAL.TTF') }}");
        }

        body {
            font-family: "Arial";
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Jumper";
        }
    </style>
    @laravelPWA
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-700">
        <header class="fixed z-50 w-full bg-white text-white shadow dark:bg-gray-700">
            @include('layouts.navigation-top')
            @include('layouts.navigation')
        </header>

        <div class="w-full min-h-screen pt-16 md:pt-30 lg:pt-40 mb-0 dark:bg-gray-900">
            <!-- Page Content -->
            <main class="pb-16 md:pb-20 lg:pb-12">
                {{ $slot }}
            </main>

            <footer class="fixed bottom-0 w-full">
                @include('layouts.navigation-bottom')
            </footer>
        </div>
    </div>

    @include('sweetalert::alert')

</body>

</html>
