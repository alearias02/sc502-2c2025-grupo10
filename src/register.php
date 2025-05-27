<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Plaza Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        body {
            background-color: #fff5f8;
        }
        .logo-wrapper {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
        }
        .logo-wrapper img {
            max-width: 250px;
        }
        .register-container {
            max-width: 500px;
            margin: 0 auto 60px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .register-title {
            color: #b30059;
            font-weight: bold;
            margin-bottom: 25px;
        }
        .form-control:focus {
            border-color: #b30059;
            box-shadow: 0 0 0 0.2rem rgba(179, 0, 89, 0.25);
        }
        .login-link {
            margin-top: 15px;
            display: block;
            text-align: center;
            color: #b30059;
        }
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

     
    <div class="logo-wrapper">
        <img src="../img/plazamedica_logo2.png" alt="Logo Plaza Médica">
    </div>

    <!-- Formulario -->
    <div class="register-container">
        <h3 class="text-center register-title">Crear Cuenta</h3>
        <form action="procesar_registro.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #b30059; border: none;">
                    Registrarse
                </button>
            </div>
        </form>
        <a href="login.php" class="login-link">¿Ya tienes una cuenta? Inicia sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>