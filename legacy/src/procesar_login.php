<?php
require_once("conexion.php");
require_once("inicio_sesion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? OR correo = ?");
        $stmt->execute([$usuario, $usuario]);
        $user = $stmt->fetch();

        if ($user && password_verify($clave, $user['clave'])) {
            $_SESSION['usuario'] = $user['usuario'];
            $_SESSION['id'] = $user['id']; 

            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Acceso no permitido.";
}