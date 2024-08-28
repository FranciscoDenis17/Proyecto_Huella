<?php
include "modelo/conexion.php";
$id = $_GET["id"];


$sql = $conexion->query("SELECT * FROM alumno WHERE usuario_id=$id");
$datos = $sql->fetch_object();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form class="col-4 p-3 m-auto" method="POST" action="controlador/modificar_producto.php">
    <h3 class="text center text-secondary">Modificar Alumno</h3>
    
    <input type="hidden" name="usuario_id" value="<?= $datos->usuario_id ?>">

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="usuario_nombre" value="<?= $datos->usuario_nombre ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" class="form-control" name="usuario_apellido" value="<?= $datos->usuario_apellido ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Usuario</label>
        <input type="text" class="form-control" name="usuario_usuario" value="<?= $datos->usuario_usuario ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">DNI</label>
        <input type="text" class="form-control" name="usuario_dni" value="<?= $datos->usuario_dni ?>">
    </div>

    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
</form>
</body>
</html>
