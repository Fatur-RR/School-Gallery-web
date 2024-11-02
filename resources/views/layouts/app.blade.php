<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - SMKN 4 Bogor</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO SMKN 4.png') }}">

    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }

        @media (max-width: 768px) {
            .sidebar-mobile {
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar-mobile.active {
                transform: translateX(0);
            }
        }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <div class="flex">
            <!-- Pastikan Anda hanya menyertakan navigasi satu kali -->
            @include('layouts.navigation')

            <!-- Main Content -->
            <main class="flex-1 py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto min-h-screen">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
