<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4 text-center">Gestión de Productos</h1>
        <ul class="nav nav-tabs justify-content-center mb-4" id="productTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="ver-tab" data-bs-toggle="tab" type="button" role="tab">Ver productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="crear-tab" data-bs-toggle="tab" type="button" role="tab">Crear producto</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="actualizar-tab" data-bs-toggle="tab" type="button" role="tab">Actualizar productos</button>
            </li>
        </ul>
        <div id="tab-content" class="bg-white rounded shadow p-4 min-vh-50">
            <!-- El contenido se cargará aquí -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function loadTabContent(url) {
            $("#tab-content").html('<div class="text-center py-5"><div class="spinner-border" role="status"></div></div>');
            $.get(url, function(data) {
                $("#tab-content").html(data);
            });
        }
        $(document).ready(function() {
            loadTabContent('/productos');
            $('#ver-tab').on('click', function() {
                loadTabContent('/productos');
                $(this).addClass('active');
                $('#crear-tab').removeClass('active');
            });
            $('#crear-tab').on('click', function() {
                loadTabContent('/productos/create');
                $(this).addClass('active');
                $('#ver-tab').removeClass('active');
            });
            $('#actualizar-tab').on('click', function() {
                loadTabContent('/productos/update');
                $(this).addClass('active');
                $('#ver-tab').removeClass('active');
            });
            
        });
    </script>
</body>
</html>