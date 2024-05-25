<?php
include_once '../db/db.php';
include_once '../modelo/tareaxpersona.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$tareaxpersona = new TareaxPersona($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $id_tarea = $_POST['id_tarea'];
        $id_persona = $_POST['id_persona'];
        $duracion = $_POST['duracion'];

        $mensaje = $tareaxpersona->crear($id_tarea, $id_persona, $duracion);
        echo $mensaje;
    }
}
?>
