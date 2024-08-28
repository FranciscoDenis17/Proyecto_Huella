<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Control de Asistencias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <header>
        <h1>Sistema de Control de Asistencias</h1>
    </header>
<?php
include "../modelo/conexion.php";
include "../controlador/guardar_asistencia.php";
?>
    <main>
        <section class="login-section">
            <h2>Ingrese su huella dactilar</h2>
            <form action="" method="POST" id="biometric-form">
                <label for="thumbprint">Coloque su dedo pulgar en el lector de huella:</label><br>
                <input type="int" placeholder="DNI del alumno" name="usuario_dni" required><br>
                
                <button class="entrada" type="submit" name="btnentrada" value="ok">Entrada</button>
                <button class="salida" type="submit" name="btnsalida" value="ok">Salida</button>
            </form>
        </section>
    </main>

    <div id="message" style="display: none;"></div>

    <footer>
        <p>Sistema de Control de Asistencias</p>
    </footer>

</body>
</html>
