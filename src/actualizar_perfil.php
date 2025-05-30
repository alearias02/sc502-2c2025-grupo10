<?php
require_once("conexion.php");
require_once("inicio_sesion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_SESSION['id'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];

    try {
        $stmt = $pdo->prepare("UPDATE usuarios SET nombre_completo = ?, correo = ?, usuario = ? WHERE id = ?");
        $stmt->execute([$nombre_completo, $correo, $usuario, $id]);

        //actualiza los datos en la sesión también
        $_SESSION['usuario'] = $usuario;

    
        header("Location: perfil.php?actualizado=1");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
    }
} else {
    echo "Acceso denegado.";
}