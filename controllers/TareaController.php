<?php
include_once '../database/db.php';
include_once '../models/Tarea.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$tarea = new Tarea($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $descripcion = $_POST['descripcion'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $id_actividad = $_POST['id_actividad'];
        $estado = $_POST['estado'];
        $presupuesto = $_POST['presupuesto'];

        $mensaje = $tarea->crear($descripcion, $fecha_inicio, $fecha_final, $id_actividad, $estado, $presupuesto);
        echo $mensaje;
    }
}

if (isset($_GET['id_tarea'])) {
    $id_tarea = $_GET['id_tarea'];
    error_log($id_tarea);

    $datosTarea = $tarea->buscar($id_tarea);

    if ($datosTarea) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            $id_actividad = $_POST['id_actividad'];
            $estado = $_POST['estado'];
            $presupuesto = $_POST['presupuesto'];

            $mensaje = $tarea->actualizar($id_tarea, $descripcion, $fecha_inicio, $fecha_final, $id_actividad, $estado, $presupuesto);
            echo $mensaje;
        }

        include_once '../vista/actualizarTarea.php';
    } else {
        echo "No se encontró ninguna tarea con el ID proporcionado.";
    }
} else {
    echo "No se ha proporcionado el ID de la tarea a actualizar.";
}

?>
