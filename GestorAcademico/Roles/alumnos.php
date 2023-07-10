<!DOCTYPE html>
<html>
<head>
    <title>Alumno</title>
</head>
<body>
    <h1>Bienvenido(a)</h1>

    <?php
    // Incluir el archivo de conexión
    require_once '../Conexiones/bd.php';

    // Obtener el nombre del usuario desde la base de datos
    $consulta = "SELECT user FROM prueba WHERE user = 2"; 
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $nombreUsuario = $fila['user'];

        echo "<p>Hola, $nombreUsuario. Bienvenido(a) a la página.</p>";
    } else {
        echo "<p>No se encontró el usuario.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>

    <p>Pagina del alumno</p>
</body>
</html>
