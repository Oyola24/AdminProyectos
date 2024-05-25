<?php
include_once '../database/db.php';

class Persona {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM personas";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $personas = array();
            while ($row = $result->fetch_assoc()) {
                $personas[] = $row;
            }
            return $personas;
        } else {
            return array();
        }
    }

    function crear($nombre, $apellidos, $direccion, $telefono, $sexo, $fecha_nacimiento, $profesion) {
        $sql = "INSERT INTO personas (nombre, apellidos, direccion, telefono, sexo, fecha_nacimiento, profesion)
        VALUES ('$nombre', '$apellidos', '$direccion', '$telefono', '$sexo', '$fecha_nacimiento', '$profesion')";

        if ($this->conn->query($sql) === TRUE) {
            return "Persona creada correctamente.";
        } else {
            return "Error al crear persona.";
        }
    }

    function buscar($id_persona) {
        $sql = "SELECT * FROM personas WHERE id_persona='$id_persona'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_persona, $nombre, $apellidos, $direccion, $telefono, $sexo, $fecha_nacimiento, $profesion) {
        $sql = "UPDATE personas SET nombre='$nombre', apellidos='$apellidos', direccion='$direccion', telefono='$telefono', sexo='$sexo', fecha_nacimiento='$fecha_nacimiento', profesion='$profesion' WHERE id_persona='$id_persona'";
        if ($this->conn->query($sql) === TRUE) {
            return "Persona actualizada correctamente.";
        } else {
            return "Error al actualizar persona.";
        }
    }
}
?>
