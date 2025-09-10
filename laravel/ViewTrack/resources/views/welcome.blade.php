<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> {{-- Añadimos 'dark' aquí para que el tema oscuro sea por defecto --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ViewTrack</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" /> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-950 text-gray-200 min-h-screen flex flex-col">
    <div class="relative flex-grow flex flex-col items-center justify-center">
        <header class="w-full max-w-7xl mx-auto px-6 lg:px-8 py-8 absolute top-0">
            <div class="flex items-center justify-between">
                <a href="/" class="flex items-center space-x-2 group">
                    <svg class="h-8 w-auto text-blue-500 group-hover:text-blue-400 transition-colors duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                    </svg>
                    <span class="font-bold text-3xl text-white group-hover:text-gray-50 transition-colors duration-200">ViewTrack</span>
                </a>

                @if (Route::has('login'))
                <nav class="flex items-center gap-4 text-sm font-medium">
                    @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-4 py-2 text-gray-400 bg-gray-800 ring-1 ring-transparent transition hover:text-white hover:bg-gray-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="rounded-md px-4 py-2 text-gray-400 ring-1 ring-transparent transition hover:text-white hover:bg-gray-800 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                        Iniciar Sesión
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="rounded-md px-4 py-2 bg-blue-600 text-white shadow-lg transition hover:bg-blue-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                        Registrarse
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif
            </div>
        </header>

        <main class="flex-grow w-full flex items-center justify-center py-20 px-6 lg:px-8">
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

                {{-- Contenido principal de la izquierda (texto) --}}
                <div class="text-center lg:text-left space-y-8">
                    <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight">
                        La forma inteligente de <span class="text-blue-500">ver y seguir</span> tu contenido.

                    </h1>


                </div>

                {{-- Maqueta del producto a la derecha (imagen o mockup) --}}
                <div class="flex justify-center lg:justify-center">

                    <div class="relative w-full max-w-xl aspect-video rounded-3xl overflow-hidden shadow-2xl border border-gray-700 bg-gray-800 p-2">
                        <div class="absolute inset-0 flex items-center justify-center z-10">
                            <svg class="w-24 h-24 text-gray-500 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                            </svg>
                        </div>
                        {{-- Simulación de una interfaz de video --}}
                        <div class="relative h-full w-full bg-gray-900 rounded-2xl flex items-center justify-center p-4">
                            <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                                <span class="text-sm font-semibold text-gray-400">ViewTrack Dashboard</span>
                                <div class="flex space-x-2">
                                    <div class="w-2.5 h-2.5 bg-red-500 rounded-full"></div>
                                    <div class="w-2.5 h-2.5 bg-yellow-400 rounded-full"></div>
                                    <div class="w-2.5 h-2.5 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-6 bg-gray-800/50 backdrop-blur-sm rounded-xl p-6 border border-gray-700 max-w-sm w-full">
                                <div class="w-16 h-16 rounded-lg bg-blue-600 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-1.25-3M15 10V5.914a2 2 0 00-2.914-1.815L12 4m6 7h3l-2 4h-7l-2 4H5m4-2h10a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm.75-2.25h4.5a.75.75 0 000-1.5h-4.5a.75.75 0 000 1.5z" />
                                    </svg>
                                </div>
                                <div class="flex-1 space-y-2">
                                    <div class="h-4 bg-gray-600 rounded w-4/5 animate-pulse"></div>
                                    <div class="h-3 bg-gray-700 rounded w-2/3 animate-pulse"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="w-full bg-gray-950 py-10 px-6 lg:px-8 text-center text-sm text-gray-500 border-t border-gray-800">
            <p>&copy; {{ date('Y') }} ViewTrack MIT License.</p>
        </footer>
    </div>
</body>

</html>