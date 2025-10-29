<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supertiendas - Registro</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .brand-logo {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            font-size: 2.5rem;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 20px;
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 0.2rem rgba(34, 197, 94, 0.25);
        }
        .btn-register {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(34, 197, 94, 0.4);
        }
        .feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="register-card p-4 p-md-5">
                <div class="row">
                    <!-- Columna izquierda - formulario -->
                    <div class="col-lg-6">
                        <div class="text-center mb-4">
                            <h1 class="brand-logo mb-2">
                                <i class="fas fa-store me-2"></i>SUPERTIENDAS
                            </h1>
                            <p class="text-muted">Crea tu cuenta para comenzar</p>
                        </div>

                        <form method="POST" action="{{ route('register.submit') }}">
                            @csrf

                            @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>{{ $errors->first() }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-user me-2 text-primary"></i>Nombre completo
                                </label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-envelope me-2 text-primary"></i>Correo electrónico
                                </label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-lock me-2 text-primary"></i>Contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'passwordIcon')">
                                        <i class="fas fa-eye" id="passwordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Confirmación -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    <i class="fas fa-lock me-2 text-primary"></i>Confirmar contraseña
                                </label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', 'confirmIcon')">
                                        <i class="fas fa-eye" id="confirmIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-register text-white w-100 mb-3">
                                <i class="fas fa-user-plus me-2"></i>Crear cuenta
                            </button>

                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    ¿Ya tienes una cuenta?
                                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-success">
                                        Inicia sesión aquí
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>

                    <!-- Columna derecha - información -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="ps-4">
                            <h3 class="fw-bold text-dark mb-4">Únete a Supertiendas</h3>
                            <p class="text-muted mb-5">
                                Regístrate y gestiona tus productos, ventas y clientes de manera profesional.
                            </p>

                            <div class="d-flex align-items-start mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-box text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Gestión Integral</h6>
                                    <p class="text-muted small mb-0">Controla inventario, ventas y reportes</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start mb-4">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-pie text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Análisis en tiempo real</h6>
                                    <p class="text-muted small mb-0">Visualiza tus métricas de negocio</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start">
                                <div class="feature-icon">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="fw-bold mb-1">Seguridad y respaldo</h6>
                                    <p class="text-muted small mb-0">Protege tus datos empresariales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Oculta alertas después de 5s
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>
</body>
</html>
