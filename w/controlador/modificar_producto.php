<?php
include $_SERVER['DOCUMENT_ROOT'] . "/w/modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    $id = $_POST["usuario_id"];
    $nombre = $_POST["usuario_nombre"];
    $apellido = $_POST["usuario_apellido"];
    $usuario = $_POST["usuario_usuario"];
    $dni = $_POST["usuario_dni"];

    
    $sql = $conexion->prepare("UPDATE alumno SET usuario_nombre = ?, usuario_apellido = ?, usuario_usuario = ?, usuario_dni = ? WHERE usuario_id = ?");
    $sql->bind_param("ssssi", $nombre, $apellido, $usuario, $dni, $id);

    if ($sql->execute()) {
        echo "Datos actualizados correctamente"; 
    } else {
        echo "Error al actualizar los datos";
    }

    $sql->close();
    $conexion->close();
}
?>
