<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supertiendas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .touch-active:active {
            transform: scale(1.05);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-green-600 py-6 shadow">
        <h1 class="text-center text-white text-3xl font-bold">SUPERTIENDAS</h1>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <section class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold text-green-700 mb-6">MENÚ</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $menus = [
                        ['name' => 'Dashboard', 'icon' => 'https://cdn.lordicon.com/kkcllwsu.json', 'route' => 'dash.index', 'shadow' => 'hover:shadow-pink-500/50', 'animated' => true],
                        ['name' => 'Marcas', 'icon' => 'https://cdn.lordicon.com/dxoycpzg.json', 'route' => 'marca.index', 'shadow' => 'hover:shadow-pink-500/50', 'animated' => true],
                        ['name' => 'Categorías', 'icon' => 'https://cdn.lordicon.com/lecprnjb.json', 'route' => 'categoria.index', 'shadow' => 'hover:shadow-yellow-500/50', 'animated' => true],
                        ['name' => 'Modos de Pago', 'icon' => 'https://cdn.lordicon.com/qhviklyi.json', 'route' => 'payment.index', 'shadow' => 'hover:shadow-blue-500/50', 'animated' => true],
                        ['name' => 'Estado', 'icon' => 'https://cdn.lordicon.com/jvihlqtw.json', 'route' => 'estado.index', 'shadow' => 'hover:shadow-purple-500/50', 'animated' => true],
                        ['name' => 'Clientes', 'icon' => 'https://cdn.lordicon.com/egmlnyku.json', 'route' => 'cliente.index', 'shadow' => 'hover:shadow-indigo-500/50', 'animated' => true],
                        ['name' => 'Productos', 'icon' => 'https://cdn.lordicon.com/xhbsnkyp.json', 'route' => 'producto.index', 'shadow' => 'hover:shadow-green-500/50', 'animated' => true],
                        ['name' => 'Facturas', 'icon' => 'https://cdn.lordicon.com/nmguxqka.json', 'route' => 'factura.index', 'shadow' => 'hover:shadow-red-500/50', 'animated' => true],
                        ['name' => 'Detalle Facturas', 'icon' => 'https://cdn.lordicon.com/akuwjdzh.json', 'route' => 'detalle.index', 'shadow' => 'hover:shadow-orange-500/50', 'animated' => true],
                    ];
                @endphp

                @foreach ($menus as $menu)
                <div class="bg-white rounded-xl shadow-md transform transition-all duration-300 p-6 text-center group hover:scale-105 {{ $menu['shadow'] }} touch-active">
                    <lord-icon
                        src="{{ $menu['icon'] }}"
                        trigger="hover"
                        style="width:64px;height:64px"
                        colors="primary:#0f766e,secondary:#22c55e">
                    </lord-icon>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">{{ $menu['name'] }}</h2>
                    <a href="{{ route($menu['route']) }}" class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full transition">
                        Ir a {{ $menu['name'] }}
                    </a>
                </div>
                @endforeach
            </div>
        </section>
    </main>
</body>
</html>
