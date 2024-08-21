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
    <body class="font-sans text-gray-900 antialiased">
        <!-- Nav Menu -->
        @include('layouts.navigation')
        <div class="max-w-7xl mx-auto min-h-screen flex items-center justify-center gap-10 pt-6 sm:pt-0">
            <div class="flex-1 flex items-center justify-center">
            <img src="https://industrial.com.bd/public/uploads/all/HJHEGC7zDka1SJIq5lMaUlTmbTf2DLaRWFOPHvpS.webp" alt="Customer Login Page Image" class="object-fill h-100">
            </div>
            <div class="flex-1 flex items-center">
            <div class="w-full mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <a class="mt-6"  href="/">
                    <img src="https://cdn.freelogovectors.net/wp-content/uploads/2023/10/daraz_logo-freelogovectors.net_.png" alt="Logo" class="w-20 h-20 object-contain">
                </a>
                {{ $slot }}
            </div>
            </div>
        </div>
    </body>
</html>
