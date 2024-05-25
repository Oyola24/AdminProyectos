<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Crear Tarea</h2>
    <form method="post" action="../controllers/TareaController.php">
        <input type="hidden" name="accion" value="agregar"> 
        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion"><br>
        <label for="fecha_inicio">Fecha de Inicio:</label><br>
        <input type="date" id="fecha_inicio" name="fecha_inicio"><br>
        <label for="fecha_final">Fecha Final:</label><br>
        <input type="date" id="fecha_final" name="fecha_final"><br>
        <label for="id_actividad">ID Actividad:</label><br>
        <input type="number" id="id_actividad" name="id_actividad"><br>
        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado"><br>
        <label for="presupuesto">Presupuesto:</label><br>
        <input type="number" step="0.01" id="presupuesto" name="presupuesto"><br><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
