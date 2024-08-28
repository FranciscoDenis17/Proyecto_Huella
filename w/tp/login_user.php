<main>
        <section id="info-section">
        <div class="col-8 p-4">
        <table class="table table">
        <thead>
         <tr>
            <th scope="col">ID</th>
           <th scope="col">Horario de Entrada</th>
           <th scope="col">Horario de Salida</th>
      </tr>
 </thead>
<tbody>
   <?php
   $sql = $conexion->query("SELECT usuario_id, registro_entrada, registro_salida FROM registroasistencias ");

 while ($resultado = $sql->fetch_object()) { ?>
  <tr>
    <td><?= $resultado->usuario_id ?></td>
    <td><?= $resultado->registro_entrada ?></td>
    <td><?= $resultado->registro_salida ?></td>
     </tr>
 <?php } ?>
</tbody>
</table>


