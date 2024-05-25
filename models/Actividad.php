<?php
include_once '../database/db.php';

class Actividad {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM actividades";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $actividades = array();
            while ($row = $result->fetch_assoc()) {
                $actividades[] = $row;
            }
            return $actividades;
        } else {
            return array();
        }
    }

    function crear($descripcion, $fecha_inicio, $fecha_final, $id_proyecto, $responsable, $estado, $presupuesto) {
        $sql = "INSERT INTO actividades (descripcion, fecha_inicio, fecha_final, id_proyecto, responsable, estado, presupuesto)
        VALUES ('$descripcion', '$fecha_inicio', '$fecha_final', '$id_proyecto', '$responsable', '$estado', '$presupuesto')";

        if ($this->conn->query($sql) === TRUE) {
            return "Actividad creada correctamente.";
        } else {
            return "Error al crear actividad.";
        }
    }

    function buscar($id_actividad) {
        $sql = "SELECT * FROM actividades WHERE id_actividad='$id_actividad'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_actividad, $descripcion, $fecha_inicio, $fecha_final, $id_proyecto, $responsable, $estado, $presupuesto) {
        $sql = "UPDATE actividades SET descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', id_proyecto='$id_proyecto', responsable='$responsable', estado='$estado', presupuesto='$presupuesto' WHERE id_actividad='$id_actividad'";
        if ($this->conn->query($sql) === TRUE) {
            return "Actividad actualizada correctamente.";
        } else {
            return "Error al actualizar actividad.";
        }
    }
}
?>
