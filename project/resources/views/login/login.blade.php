<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-4">Inicio de Sesión</h3>

        <form method="POST" action="#">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="usuario@correo.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="********">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>

        <hr>

        {{-- Simulación de sesión iniciada --}}
        @php
            $usuario_logueado = true; // Cambiá a false para simular no logueado
            $rol = 'admin'; // Cambiá a 'usuario' o 'admin'
        @endphp

        @if (!$usuario_logueado)
            <div class="alert alert-warning mt-3 text-center">
                Debes iniciar sesión para acceder al sistema.
            </div>
        @elseif ($rol === 'admin')
            <div class="alert alert-success mt-3 text-center">
                Bienvenido <strong>Administrador</strong>. Tienes acceso completo.
            </div>
        @else
            <div class="alert alert-info mt-3 text-center">
                Bienvenido <strong>Usuario</strong>. Tienes acceso limitado.
            </div>
        @endif
    </div>
</div>

</body>
</html>
