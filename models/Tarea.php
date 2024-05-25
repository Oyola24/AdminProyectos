<?php
include_once '../database/db.php';

class Tarea {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM tareas";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $tareas = array();
            while ($row = $result->fetch_assoc()) {
                $tareas[] = $row;
            }
            return $tareas;
        } else {
            return array();
        }
    }

    function crear($descripcion, $fecha_inicio, $fecha_final, $id_actividad, $estado, $presupuesto) {
        $sql = "INSERT INTO tareas (descripcion, fecha_inicio, fecha_final, id_actividad, estado, presupuesto)
        VALUES ('$descripcion', '$fecha_inicio', '$fecha_final', '$id_actividad', '$estado', '$presupuesto')";

        if ($this->conn->query($sql) === TRUE) {
            return "Tarea creada correctamente.";
        } else {
            return "Error al crear tarea.";
        }
    }

    function buscar($id_tarea) {
        $sql = "SELECT * FROM tareas WHERE id_tarea='$id_tarea'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_tarea, $descripcion, $fecha_inicio, $fecha_final, $id_actividad, $estado, $presupuesto) {
        $sql = "UPDATE tareas SET descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_final='$fecha_final', id_actividad='$id_actividad', estado='$estado', presupuesto='$presupuesto' WHERE id_tarea='$id_tarea'";
        if ($this->conn->query($sql) === TRUE) {
            return "Tarea actualizada correctamente.";
        } else {
            return "Error al actualizar tarea.";
        }
    }
}
?>
