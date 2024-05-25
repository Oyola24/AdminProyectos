<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
</head>
<body>
    <a href="../index.php">Regresar</a>
    <h2>Crear Proyecto</h2>
    <form method="post" action="../controllers/ProyectoController.php">
        <input type="hidden" name="accion" value="agregar"> 
        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion"><br>
        <label for="fecha_inicio">Fecha de Inicio:</label><br>
        <input type="date" id="fecha_inicio" name="fecha_inicio"><br>
        <label for="fecha_entrega">Fecha de Entrega:</label><br>
        <input type="date" id="fecha_entrega" name="fecha_entrega"><br>
        <label for="valor">Valor:</label><br>
        <input type="number" step="0.01" id="valor" name="valor"><br>
        <label for="lugar">Lugar:</label><br>
        <input type="text" id="lugar" name="lugar"><br>
        <label for="responsable">Responsable:</label><br>
        <input type="text" id="responsable" name="responsable"><br>
        <label for="estado">Estado:</label><br>
        <input type="text" id="estado" name="estado"><br><br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>
