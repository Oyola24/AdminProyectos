<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Recurso a Tarea</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Asignar Recurso a Tarea</h2>
    <form method="post" action="../controllers/TareaxRecursoController.php">
        <input type="hidden" name="accion" value="agregar">
        
        <label for="id_tarea">Tarea:</label><br>
        <select id="id_tarea" name="id_tarea">
            <?php
            include_once '../database/db.php';
            include_once '../models/Tarea.php';
            $conexion = new Conectar();
            $conn = $conexion->conectar();
            $tarea = new Tarea($conn);
            $tareas = $tarea->listar();
            foreach ($tareas as $t) {
                echo "<option value='".$t['id_tarea']."'>".$t['descripcion']."</option>";
            }
            ?>
        </select><br>
        
        <label for="id_recurso">Recurso:</label><br>
        <select id="id_recurso" name="id_recurso">
            <?php
            include_once '../models/Recurso.php';
            $recurso = new Recurso($conn);
            $recursos = $recurso->listar();
            foreach ($recursos as $r) {
                echo "<option value='".$r['id_recurso']."'>".$r['descripcion']."</option>";
            }
            ?>
        </select><br>
        
        <label for="cantidad">Cantidad:</label><br>
        <input type="number" step="0.01" id="cantidad" name="cantidad"><br><br>
        <input type="submit" value="Asignar">
    </form>
</body>
</html>
