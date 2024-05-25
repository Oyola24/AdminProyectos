<?php
include_once '../database/db.php';
include_once '../models/Tareaxrecurso.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$tareaxrecurso = new TareaxRecurso($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $id_tarea = $_POST['id_tarea'];
        $id_recurso = $_POST['id_recurso'];
        $cantidad = $_POST['cantidad'];

        $mensaje = $tareaxrecurso->crear($id_tarea, $id_recurso, $cantidad);
        echo $mensaje;
    }
}
?>
