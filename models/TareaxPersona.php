<?php
include_once '../database/db.php';

class TareaxPersona {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM tareaxpersona";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $tareasPersonas = array();
            while ($row = $result->fetch_assoc()) {
                $tareasPersonas[] = $row;
            }
            return $tareasPersonas;
        } else {
            return array();
        }
    }

    function crear($id_tarea, $id_persona, $duracion) {
        $sql = "INSERT INTO tareaxpersona (id_tarea, id_persona, duracion)
        VALUES ('$id_tarea', '$id_persona', '$duracion')";

        if ($this->conn->query($sql) === TRUE) {
            return "Tarea-Persona creado correctamente.";
        } else {
            return "Error al crear tarea-persona.";
        }
    }

    function buscar($id_tarea, $id_persona) {
        $sql = "SELECT * FROM tareaxpersona WHERE id_tarea='$id_tarea' AND id_persona='$id_persona'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_tarea, $id_persona, $duracion) {
        $sql = "UPDATE tareaxpersona SET duracion='$duracion' WHERE id_tarea='$id_tarea' AND id_persona='$id_persona'";
        if ($this->conn->query($sql) === TRUE) {
            return "Tarea-Persona actualizado correctamente.";
        } else {
            return "Error al actualizar tarea-persona.";
        }
    }
}
?>
