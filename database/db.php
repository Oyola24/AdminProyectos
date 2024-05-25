<?php

class Conectar {
    private $conn;
    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "proyectos"; 
        $this->conn = new mysqli($servername, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Error en la conexión con la DB.");
        }
    }

    public function conectar() {
        return $this->conn;
    }
}
?>