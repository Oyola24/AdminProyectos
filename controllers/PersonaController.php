<?php
include_once '../database/db.php';
include_once '../models/Persona.php';

$conexion = new Conectar();
$conn = $conexion->conectar();

$persona = new Persona($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion']) && $_POST['accion'] == 'crear') {

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $sexo = $_POST['sexo'];
        $fechanacimiento = $_POST['fechaNacimiento'];
        $profesion = $_POST['profesion'];

        $mensaje = $persona->crear($nombre, $apellidos, $direccion, $telefono, $sexo, $fechanacimiento, $profesion);
        echo $mensaje;
    }
}

if (isset($_GET['id_persona'])) {
    $id_persona = $_GET['id_persona'];
    error_log($id_persona);

    $datosPersona = $persona->buscar($id_persona);

    if ($datosPersona) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $sexo = $_POST['sexo'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];
            $profesion = $_POST['profesion'];

            $mensaje = $persona->actualizar($id_persona, $nombre, $apellidos, $direccion, $telefono, $sexo, $fecha_nacimiento, $profesion);
            echo $mensaje;
        }

        include_once '../vista/actualizarPersona.php';
    } else {
        echo "No se encontró ninguna persona con el ID proporcionado.";
    }
} else {
        
}

?>
