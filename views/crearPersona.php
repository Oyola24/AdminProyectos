<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Crear Persona</h2>
    <form method="post" action="../controllers/PersonaController.php">
        <input type="hidden" name="accion" value="agregar"> 
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos"><br>
        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion"><br>
        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono"><br>
        <label for="sexo">Sexo:</label><br>
        <select id="sexo" name="sexo">
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>
        <label for="profesion">Profesión:</label><br>
        <input type="text" id="profesion" name="profesion"><br><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>

</body>
</html>