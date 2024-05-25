<?php
require_once('./database/db.php');

$conexion = new Conectar();
$conn = $conexion->conectar();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
echo "<h2>TALLER PHP</h2>
<a href='./views/crearPersona.php'>crear Persona</a><br>
<a href='./views/listarPersonas.php'>Listar Persona</a><br>
<a href='./views/crearProyecto.php'>crear Proyecto</a><br>
<a href='./views/listarProyectos.php'>Listar Proyecto</a><br>
<a href='./views/crearTarea.php'>crear Tarea</a><br>
<a href='./views/listarTareas.php'>Listar Tareas</a><br>
<a href='./views/crearActividad.php'>crear Actividad</a><br>
<a href='./views/listarActividades.php'>Listar Actividades</a><br>
<a href='./views/crearTareaxRecurso.php'>Asignar Recursos a Tarea</a><br>
<a href='./views/crearTareaxPersona.php'>Asignar Persona a Tarea</a><br>
<a href='./views/listarProyectos.php'>Proyectos Terminados</a><br>
";    
}
?>