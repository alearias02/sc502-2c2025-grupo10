<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Plaza Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
        body {
            background-color: #fff5f8;
        }
        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            color: #b30059;
            font-weight: bold;
            margin-bottom: 25px;
        }
        .form-control:focus {
            border-color: #b30059;
            box-shadow: 0 0 0 0.2rem rgba(179, 0, 89, 0.25);
        }
        .register-link {
            margin-top: 15px;
            display: block;
            text-align: center;
            color: #b30059;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h3 class="text-center login-title">Iniciar Sesión</h3>
        <form action="procesar_login.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario o Correo</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="clave" name="clave" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" style="background-color: #b30059; border: none;">
                    Ingresar
                </button>
            </div>
        </form>
        <a href="register.php" class="register-link">¿No tienes cuenta? Regístrate</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>