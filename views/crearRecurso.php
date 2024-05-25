<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Recurso</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Crear Recurso</h2>
    <form method="post" action="../controllers/RecursoController.php">
        <input type="hidden" name="accion" value="agregar"> 
        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion"><br>
        <label for="valor">Valor:</label><br>
        <input type="number" step="0.01" id="valor" name="valor"><br>
        <label for="unidad_de_medida">Unidad de Medida:</label><br>
        <input type="text" id="unidad_de_medida" name="unidad_de_medida"><br><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
