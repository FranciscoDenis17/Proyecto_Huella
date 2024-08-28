<?php
include $_SERVER['DOCUMENT_ROOT'] . "/w/modelo/conexion.php";
date_default_timezone_set('America/Argentina/Buenos_Aires');

if (!empty($_POST["btnentrada"])) {
    if (!empty($_POST["usuario_dni"])) {
        $dni = $_POST["usuario_dni"];

        
        $consulta = $conexion->query("SELECT COUNT(*) as total FROM alumno WHERE usuario_dni = '$dni'");
        $resultado = $consulta->fetch_object();

        if ($resultado->total > 0) {
            
            $registro_entrada = date("H:i:s");
            $sql = $conexion->prepare("INSERT INTO registroasistencias (usuario_id, registro_entrada) VALUES ((SELECT usuario_id FROM alumno WHERE usuario_dni = ?), ?)");
            $sql->bind_param("ss", $dni, $registro_entrada);
            if ($sql->execute()) {
                echo "<script>alert('Entrada registrada correctamente.');</script>";
            } else {
                echo "<script>alert('Error al registrar la entrada.');</script>";
            }
        } else {
            echo "<script>alert('El DNI ingresado no existe.');</script>";
        }
    } else {
        echo "<script>alert('Por favor, ingrese el DNI.');</script>";
    }
}

if (!empty($_POST["btnsalida"])) {
    if (!empty($_POST["usuario_dni"])) {
        $dni = $_POST["usuario_dni"];

        
        $consulta = $conexion->query("SELECT COUNT(*) as total FROM alumno WHERE usuario_dni = '$dni'");
        $resultado = $consulta->fetch_object();

        if ($resultado->total > 0) {
            
            $registro_salida = date("H:i:s");

            $busqueda = $conexion->prepare("SELECT registro_id FROM registroasistencias WHERE usuario_id = (SELECT usuario_id FROM alumno WHERE usuario_dni = ?) AND registro_salida IS NULL ORDER BY registro_id DESC LIMIT 1");
            $busqueda->bind_param("s", $dni);
            $busqueda->execute();
            $busqueda->bind_result($registro_id);
            $busqueda->fetch();
            $busqueda->close();

            if ($registro_id) {
                $sql = $conexion->prepare("UPDATE registroasistencias SET registro_salida = ? WHERE registro_id = ?");
                $sql->bind_param("si", $registro_salida, $registro_id);
                if ($sql->execute()) {
                    echo "<script>alert('Salida registrada correctamente.');</script>";
                } else {
                    echo "<script>alert('Error al registrar la salida.');</script>";
                }
            } else {
                echo "<script>alert('No se encontró un registro de entrada para este DNI.');</script>";
            }
        } else {
            echo "<script>alert('El DNI ingresado no existe.');</script>";
        }
    } else {
        echo "<script>alert('Por favor, ingrese el DNI.');</script>";
    }
}
?>
