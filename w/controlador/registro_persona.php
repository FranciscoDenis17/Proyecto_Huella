<?php

include $_SERVER['DOCUMENT_ROOT'] . "/w/modelo/conexion.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');

if (!empty($_POST["btnregistrar"])) {
    
    $usuario_nombre = $_POST["usuario_nombre"];
    $usuario_apellido = $_POST["usuario_apellido"];
    $usuario_usuario = $_POST["usuario_usuario"];
    $usuario_dni = $_POST["usuario_dni"];
    $usuario_contraseña = $_POST["usuario_contraseña"];  

    
    if (!empty($usuario_nombre) && !empty($usuario_apellido) && !empty($usuario_usuario) && !empty($usuario_dni) && !empty($usuario_contraseña)) {

        
        $consulta = $conexion->prepare("INSERT INTO alumno (usuario_nombre, usuario_apellido, usuario_usuario, usuario_dni, usuario_contraseña) VALUES (?, ?, ?, ?, ?)");
        $consulta->bind_param("sssss", $usuario_nombre, $usuario_apellido, $usuario_usuario, $usuario_dni, $usuario_contraseña);

        if ($consulta->execute()) {
            echo '<h3 class="Ok">Has registrado correctamente</h3>';
        } else {
            echo '<h3 class="Bad">Ocurrió un error al registrar</h3>';
        }

        $consulta->close();
    } else {
        echo '<h3 class="Bad">Completa todos los campos</h3>';
    }
    
    $conexion->close();
}
?>
