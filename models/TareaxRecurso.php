<?php
include_once '../database/db.php';

class TareaxRecurso {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM tareaxrecurso";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $tareasRecursos = array();
            while ($row = $result->fetch_assoc()) {
                $tareasRecursos[] = $row;
            }
            return $tareasRecursos;
        } else {
            return array();
        }
    }

    function crear($id_tarea, $id_recurso, $cantidad) {
        $sql = "INSERT INTO tareaxrecurso (id_tarea, id_recurso, cantidad)
        VALUES ('$id_tarea', '$id_recurso', '$cantidad')";

        if ($this->conn->query($sql) === TRUE) {
            return "Tarea-Recurso creado correctamente.";
        } else {
            return "Error al crear tarea-recurso.";
        }
    }

    function buscar($id_tarea, $id_recurso) {
        $sql = "SELECT * FROM tareaxrecurso WHERE id_tarea='$id_tarea' AND id_recurso='$id_recurso'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_tarea, $id_recurso, $cantidad) {
        $sql = "UPDATE tareaxrecurso SET cantidad='$cantidad' WHERE id_tarea='$id_tarea' AND id_recurso='$id_recurso'";
        if ($this->conn->query($sql) === TRUE) {
            return "Tarea-Recurso actualizado correctamente.";
        } else {
            return "Error al actualizar tarea-recurso.";
        }
    }
}
?>
