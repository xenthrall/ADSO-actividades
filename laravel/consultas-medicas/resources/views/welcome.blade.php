<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Panel Principal</title>
</head>

<body class="bg-light">

    <div class="container text-center mt-5">
        <!-- Título centrado -->
        <h1 class="mb-5 fw-bold text-primary">Sistema</h1>

        <!-- Contenedor de tarjetas -->
        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title mb-4">Gestión de Pacientes</h5>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-primary">Ir a gestionar pacientes</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title mb-4">Gestión de Consultas</h5>
                        <a href="{{ route('consultas_medicas.index') }}" class="btn btn-primary">Ir a gestionar consultas</a>
                    </div>
                </div>
            </div>

           
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
