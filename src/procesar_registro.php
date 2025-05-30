<?php
require_once(__DIR__ . '/conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);  

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (cedula, nombre_completo, usuario, correo, fecha_nacimiento, clave)
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$cedula, $nombre, $usuario, $correo, $fecha_nacimiento, $clave]);

        header("Location: login.php?exito=1");
        exit();
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
} else {
    echo "Acceso denegado.";
}
?>