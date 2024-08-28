<?php
session_start(); 
include "../modelo/conexion.php";

if (!isset($_SESSION['usuario_id'])) {
    echo "<script>alert('Por favor, inicie sesión primero.'); window.location.href = 'login_usuario.php';</script>";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Sistema de Asistencias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Perfil de Usuario</h1>
    </header>
    <main>
        <section id="info-section">
            <div class="col-8 p-4">
                <h2>Historial de Asistencias</h2>
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Horario de Entrada</th>
                            <th scope="col">Horario de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                     
                        $sql = $conexion->prepare("SELECT a.usuario_dni, r.registro_entrada, r.registro_salida 
                                                   FROM registroasistencias r 
                                                   JOIN alumno a ON r.usuario_id = a.usuario_id 
                                                   WHERE r.usuario_id = ?");
                        $sql->bind_param("i", $usuario_id);
                        $sql->execute();
                        $result = $sql->get_result();

                        while ($resultado = $result->fetch_object()) { ?>
                            <tr>
                                <td><?= $resultado->usuario_dni ?></td>
                                <td><?= $resultado->registro_entrada ?></td>
                                <td><?= $resultado->registro_salida ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer>
        <p>Sistema de Control de Asistencias</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>
</html>
