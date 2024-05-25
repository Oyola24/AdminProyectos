<?php
include_once '../database/db.php';
include_once '../models/Proyecto.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$proyecto = new Proyecto($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $descripcion = $_POST['descripcion'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $valor = $_POST['valor'];
        $lugar = $_POST['lugar'];
        $responsable = $_POST['responsable'];
        $estado = $_POST['estado'];

        $mensaje = $proyecto->crear($descripcion, $fecha_inicio, $fecha_entrega, $valor, $lugar, $responsable, $estado);
        echo $mensaje;
    }
}

if (isset($_GET['id_proyecto'])) {
    $id_proyecto = $_GET['id_proyecto'];
    error_log($id_proyecto);

    $datosProyecto = $proyecto->buscar($id_proyecto);

    if ($datosProyecto) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $descripcion = $_POST['descripcion'];
            $fecha_inicio = $_POST['fecha_inicio'];
            $fecha_entrega = $_POST['fecha_entrega'];
            $valor = $_POST['valor'];
            $lugar = $_POST['lugar'];
            $responsable = $_POST['responsable'];
            $estado = $_POST['estado'];

            $mensaje = $proyecto->actualizar($id_proyecto, $descripcion, $fecha_inicio, $fecha_entrega, $valor, $lugar, $responsable, $estado);
            echo $mensaje;
        }

        include_once '../vista/actualizarProyecto.php';
    } else {
        echo "No se encontró ningún proyecto con el ID proporcionado.";
    }
} 

?>
