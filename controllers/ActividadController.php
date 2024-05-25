<?php
include_once '../database/db.php';
include_once '../models/Actividad.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$actividad = new Actividad($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $descripcion = $_POST['descripcion'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_final = $_POST['fecha_final'];
        $id_proyecto = $_POST['id_proyecto'];
        $responsable = $_POST['responsable'];
        $estado = $_POST['estado'];
        $presupuesto = $_POST['presupuesto'];

        $mensaje = $actividad->crear($descripcion, $fecha_inicio, $fecha_final, $id_proyecto, $responsable, $estado, $presupuesto);
        echo $mensaje;
    }
}

if (isset($_GET['id_actividad'])) {
    $id_actividad = $_GET['id_actividad'];
    error_log($id_actividad);

    $datosActividad = $actividad->buscar($id_actividad);

    if ($datosActividad) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_final = $_POST['fecha_final'];
            $id_proyecto = $_POST['id_proyecto'];
            $responsable = $_POST['responsable'];
            $estado = $_POST['estado'];
            $presupuesto = $_POST['presupuesto'];

            $mensaje = $actividad->actualizar($id_actividad, $descripcion, $fecha_inicio, $fecha_final, $id_proyecto, $responsable, $estado, $presupuesto);
            echo $mensaje;
        }

        include_once '../vista/actualizarActividad.php';
    } else {
        echo "No se encontró ninguna actividad con el ID proporcionado.";
    }
} 

?>
