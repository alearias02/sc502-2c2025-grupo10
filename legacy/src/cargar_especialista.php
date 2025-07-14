<?php
require_once('conexion.php');

if (isset($_POST['especialidad'])) {
    $especialidad = $_POST['especialidad'];
    $stmt = $pdo->prepare("SELECT id, nombre FROM especialistas WHERE especialidad = ?");
    $stmt->execute([$especialidad]);

    echo '<option value="">Seleccione un especialista</option>';
    while ($row = $stmt->fetch()) {
        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nombre']) . '</option>';
    }
}
?>