<?php
include $_SERVER['DOCUMENT_ROOT'] . "/w/modelo/conexion.php"; 

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("DELETE FROM alumno WHERE usuario_id = $id");
    if ($sql) {
        echo "Alumno eliminado correctamente";
    } else {
        echo "Error al eliminar el alumno";
    }
}
?>
