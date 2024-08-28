<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/login.php";
    ?>
    <main>
        <section id="login-user">
            <h2 style="text-align: center">Ingrese sus datos</h2>
            <form id="login-form" action="" method="POST">
                <label for="usuario_usuario">Usuario:</label>
                <input type="text" id="usuario_usuario" name="usuario_usuario" required><br>

                <label for="usuario_contraseña">Contraseña:</label>
                <input type="password" id="usuario_contraseña" name="usuario_contraseña" required><br>
                
                <button type="submit" name="submit">Iniciar Sesión</button>
                <a href="registrar_asistencia.php">Registrar Asistencia</a>
                
            </form>
        </section>
    </main>

    <footer>
        <p>Sistema de Control de Asistencias</p>
    </footer>

</body>
</html>