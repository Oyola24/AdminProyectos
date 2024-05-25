<?php
include_once '../database/db.php';

class Proyecto {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function listar() {
        $sql = "SELECT * FROM proyectos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $proyectos = array();
            while ($row = $result->fetch_assoc()) {
                $proyectos[] = $row;
            }
            return $proyectos;
        } else {
            return array();
        }
    }

    function crear($descripcion, $fecha_inicio, $fecha_entrega, $valor, $lugar, $responsable, $estado) {
        $sql = "INSERT INTO proyectos (descripcion, fecha_inicio, fecha_entrega, valor, lugar, responsable, estado)
        VALUES ('$descripcion', '$fecha_inicio', '$fecha_entrega', '$valor', '$lugar', '$responsable', '$estado')";

        if ($this->conn->query($sql) === TRUE) {
            return "Proyecto creado correctamente.";
        } else {
            return "Error al crear proyecto.";
        }
    }

    function buscar($id_proyecto) {
        $sql = "SELECT * FROM proyectos WHERE id_proyecto='$id_proyecto'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    function actualizar($id_proyecto, $descripcion, $fecha_inicio, $fecha_entrega, $valor, $lugar, $responsable, $estado) {
        $sql = "UPDATE proyectos SET descripcion='$descripcion', fecha_inicio='$fecha_inicio', fecha_entrega='$fecha_entrega', valor='$valor', lugar='$lugar', responsable='$responsable', estado='$estado' WHERE id_proyecto='$id_proyecto'";
        if ($this->conn->query($sql) === TRUE) {
            return "Proyecto actualizado correctamente.";
        } else {
            return "Error al actualizar proyecto.";
        }
    }
}
?>
