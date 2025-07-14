<?php
require_once("inicio_sesion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

require_once("conexion.php");

$mensaje = "";
$claseAlerta = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_SESSION['id'];
    $id_especialista = $_POST['id_especialista'] ?? null;
    $fecha = $_POST['fecha'] ?? '';
    $hora = $_POST['hora'] ?? '';
    $motivo = $_POST['motivo'] ?? '';

    if ($id_especialista && $fecha && $hora && $motivo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO citas (id_usuario, id_especialista, fecha, hora, motivo) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$id_usuario, $id_especialista, $fecha, $hora, $motivo]);

            $mensaje = "¡Cita registrada exitosamente!";
            $claseAlerta = "success";
        } catch (PDOException $e) {
            $mensaje = "Error al registrar cita: " . $e->getMessage();
            $claseAlerta = "danger";
        }
    } else {
        $mensaje = "Todos los campos son obligatorios.";
        $claseAlerta = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <?php if ($mensaje): ?>
            <div class="alert alert-<?php echo $claseAlerta; ?> text-center" role="alert">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
            <div class="text-center mt-4">
                <a href="index.php" class="btn btn-outline-primary">Volver al inicio</a>
                <a href="hacer_cita.php" class="btn btn-outline-secondary">Agendar otra cita</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
                Algo salió mal. Intenta de nuevo.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>