<?php
require_once("inicio_sesion.php");

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

require_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hacer Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Solicitar una Cita</h2>
    <form action="procesar_cita.php" method="POST">
        <!-- Especialidad -->
        <div class="mb-3">
            <label for="especialidad" class="form-label">Especialidad</label>
            <select name="especialidad" id="especialidad" class="form-select" required>
                <option value="">Seleccione una especialidad</option>
                <?php
                $stmt = $pdo->query("SELECT DISTINCT especialidad FROM especialistas ORDER BY especialidad");
                while ($row = $stmt->fetch()) {
                    echo "<option value=\"" . htmlspecialchars($row['especialidad']) . "\">" . htmlspecialchars($row['especialidad']) . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Especialista -->
        <div class="mb-3">
            <label for="id_especialista" class="form-label">Especialista</label>
            <select name="id_especialista" id="id_especialista" class="form-select" required>
                <option value="">Seleccione un especialista</option>
            </select>
        </div>

        <!-- Fecha -->
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        <!-- Hora -->
        <div class="mb-3">
            <label for="hora" class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <!-- Motivo -->
        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo de la Cita</label>
            <textarea name="motivo" class="form-control" rows="3" placeholder="Describa brevemente el motivo de la cita" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Agendar Cita</button>
    </form>
</div>

<script>
$(document).ready(function() {
    $('#especialidad').change(function() {
        var especialidad = $(this).val();
        $('#id_especialista').html('<option>Cargando...</option>');
        $.post('cargar_especialista.php', {especialidad: especialidad}, function(data) {
            $('#id_especialista').html(data);
        });
    });
});
</script>
</body>
</html>