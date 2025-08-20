@extends('layouts.app')

@section('content')
<style>
    /* Estilo para que el enlace ocupe toda la tarjeta y no tenga decoración */
    .card-link {
        text-decoration: none;
        color: inherit;
        /* Hereda el color del texto del padre */
    }

    .card-link:hover {
        text-decoration: none;
        color: inherit;
    }

    .card-feature {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
    }

    .card-feature:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        cursor: pointer;
        /* Cambia el cursor para indicar que es clickeable */
    }

    .icon-feature {
        font-size: 2.5rem;
        color: #0d6efd;
        /* Color primario de Bootstrap */
    }
</style>

<div class="container mt-5 py-5">
    <div class="row text-center mb-4">
        <div class="col">
            <h2 class="display-5">Gestionar Clientes</h2>
            <p class="lead text-muted">Todo lo que necesitas para una gestión impecable.</p>
        </div>
    </div>
    <div class="row items-center justify-content-center">
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="/clientes/index" class="card-link">
                <div class="card h-100 text-center p-3 card-feature">
                    <div class="card-body">
                        <i class="fas fa-plus-circle icon-feature mb-3"></i>
                        <h5 class="card-title">Ir a gestionar clientes</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<footer class="text-center mt-5">
    <p class="text-muted">© 2025 TechSolutions</p>
</footer>

@endsection