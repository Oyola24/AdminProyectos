<?php
include_once '../database/db.php';
include_once '../models/Recurso.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$recurso = new Recurso($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'agregar') {

        $descripcion = $_POST['descripcion'];
        $valor = $_POST['valor'];
        $unidad_de_medida = $_POST['unidad_de_medida'];

        $mensaje = $recurso->crear($descripcion, $valor, $unidad_de_medida);
        echo $mensaje;
    }
}

if (isset($_GET['id_recurso'])) {
    $id_recurso = $_GET['id_recurso'];
    error_log($id_recurso);

    $datosRecurso = $recurso->buscar($id_recurso);

    if ($datosRecurso) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $descripcion = $_POST['descripcion'];
            $valor = $_POST['valor'];
            $unidad_de_medida = $_POST['unidad_de_medida'];

            $mensaje = $recurso->actualizar($id_recurso, $descripcion, $valor, $unidad_de_medida);
            echo $mensaje;
        }

        include_once '../vista/actualizarRecurso.php';
    } else {
        echo "No se encontró ningún recurso con el ID proporcionado.";
    }
} else {
    echo "No se ha proporcionado el ID del recurso a actualizar.";
}

?>
