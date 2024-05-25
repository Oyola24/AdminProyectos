<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Persona a Tarea</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Asignar Persona a Tarea</h2>
    <form method="post" action="../controllers/TareaxPersonaController.php">
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
        
        <label for="id_persona">Persona:</label><br>
        <select id="id_persona" name="id_persona">
            <?php
            include_once '../models/Persona.php';
            $persona = new Persona($conn);
            $personas = $persona->listar();
            foreach ($personas as $p) {
                echo "<option value='".$p['id_persona']."'>".$p['nombre']." ".$p['apellidos']."</option>";
            }
            ?>
        </select><br>
        
        <label for="duracion">Duración:</label><br>
        <input type="number" step="0.01" id="duracion" name="duracion"><br><br>
        <input type="submit" value="Asignar">
    </form>
</body>
</html>
