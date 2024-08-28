<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/c678bede21.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
   
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar.php";
    ?>
     <div class="container-fluid row">
     <form class="col-4 p-3" method="POST" action="controlador/registro_persona.php">
     <?php
    
    include "controlador/registro_persona.php";
    ?>
    <h3 class="text-center text-secondary">Registro de Personas</h3>
    <div class="mb-2">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="usuario_nombre">
    </div>
    <div class="mb-2">
        <label class="form-label">Apellido</label>
        <input type="text" class="form-control" name="usuario_apellido">
    </div>
    <div class="mb-2">
        <label class="form-label">Usuario</label>
        <input type="text" class="form-control" name="usuario_usuario">
    </div>
    <div class="mb-2">
        <label class="form-label">Contraseña</label>
        <input type="password" class="form-control" name="usuario_contraseña">
    </div>
    <div class="mb-2">
        <label class="form-label">DNI</label>
        <input type="text" class="form-control" name="usuario_dni">
    </div>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
</form>

<div class="col-8 p-4">
<table class="table table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Usuario</th>
      <th scope="col">DNI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $sql=$conexion->query(" SELECT `usuario_id`,`usuario_nombre`, `usuario_apellido`, `usuario_usuario`, `usuario_dni` FROM `asistencias_bd`.`alumno` ");
    while($datos=$sql->fetch_object()){?>
        <tr>
      <td><?= $datos-> usuario_id ?></td>
      <td><?= $datos-> usuario_nombre ?></td>
      <td><?= $datos-> usuario_apellido ?></td>
      <td><?= $datos-> usuario_usuario ?></td>
      <td><?= $datos-> usuario_dni ?></td>
      <td>
        <a href="modificar_producto.php?id=<?=$datos->usuario_id?>" class="btn btn-small btn warning"><i class="fa-regular fa-pen-to-square"></i></a>
        <a href="controlador/eliminar.php?id=<?=$datos->usuario_id?>" class="btn btn-small btn danger"><i class="fa-solid fa-trash-can"></i></a>
      </td>
    </tr>
    </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>
</div>
</div>
<footer>
        <p>Sistema de Control de Asistencias</p>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>