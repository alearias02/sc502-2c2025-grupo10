<?php
require_once("conexion.php");
require_once("inicio_sesion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id_usuario]);
$usuario = $stmt->fetch();

if (!$usuario) {
    echo "<div class='alert alert-danger'>No se encontró el usuario.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Mi Perfil</h2>

    <?php if (isset($_GET['actualizado'])): ?>
        <div class="alert alert-success">✅ Perfil actualizado correctamente.</div>
    <?php endif; ?>

    <form action="actualizar_perfil.php" method="POST">
        <div class="mb-3">
            <label for="nombre_completo" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre_completo"
                value="<?= htmlspecialchars($usuario['nombre_completo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo"
                value="<?= htmlspecialchars($usuario['correo']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" name="usuario"
                value="<?= htmlspecialchars($usuario['usuario']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
</body>
</html>