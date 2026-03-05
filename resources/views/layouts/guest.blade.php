<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>VIP2CARS - Acceso</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .bg-vip-blue { background-color: #1B3A6B; }
            .text-vip-gold { color: #FFD700; }
            .login-card { 
                border-top: 5px solid #FFD700; 
                box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="mb-4">
                <a href="/" class="text-decoration-none text-center">
                    <h1 class="font-bold tracking-wider" style="font-size: 2.5rem; color: #1B3A6B;">
                        VIP2<span class="text-vip-gold">CARS</span>
                    </h1>
                    <p class="text-gray-500 text-center uppercase tracking-widest text-xs">Taller Automotriz Premium</p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg login-card">
                {{ $slot }}
            </div>

            <div class="mt-8 text-gray-400 text-xs">
                &copy; {{ date('Y') }} VIP2CARS. Todos los derechos reservados.
            </div>
        </div>
    </body>
</html>
