<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>@yield('title')</title>
        <style>
        /* Imagen de fondo con opacidad */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://wallpapercave.com/wp/wp2576830.jpg') no-repeat center center/cover;
            opacity: 0.3;
            /* Ajusta opacidad (0 = transparente, 1 = sin transparencia) */
            z-index: -1;
        }

        /* Centrado vertical y horizontal */
        .centered-content {
            height: 100vh;
            /* toda la altura de la pantalla */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Título atractivo */
        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 1500;
            font-size: 5rem;
            color: #0d6efd;
            /* azul Bootstrap */
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    
    <h1 class="text-center mt-4">@yield('titleContent')</h1>

    <div class="container mt-4">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <footer>
        <div class="text-center p-3" style="background-color: #f8f9fa;">
            &copy; Autor: Fredy Andrey Medina Caicedo. Todos los derechos reservados.
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>