<?php
session_start(); 
include $_SERVER['DOCUMENT_ROOT'] . "/w/modelo/conexion.php";

if (isset($_POST["submit"])) {
    if (!empty($_POST["usuario_usuario"]) && !empty($_POST["usuario_contraseña"])) {
        $usuario_usuario = $_POST["usuario_usuario"];
        $usuario_contraseña = $_POST["usuario_contraseña"]; 

   
        $sql = $conexion->prepare("SELECT usuario_id FROM alumno WHERE usuario_usuario = ? AND usuario_contraseña = ?");
        $sql->bind_param("ss", $usuario_usuario, $usuario_contraseña);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['usuario_id'] = $row['usuario_id']; 
            header("Location: ../vistas/profile.php"); 
            exit();
        } else {
            echo "<script>alert('El usuario no existe o la contraseña es incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Los campos están vacíos');</script>";
    }
}
?>
