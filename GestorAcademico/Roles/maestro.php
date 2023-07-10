<!DOCTYPE html>
<html>
<head>
    <title>Página de Maestros</title>
    <style>
        /* Estilos CSS para la página */
        /* ... Agrega aquí tus estilos personalizados ... */
    </style>
</head>
<body>
    <h1>Página de Maestros</h1>
    <h2>Lista de Alumnos</h2>

    <?php
    // Datos de conexión a la base de datos
    $servername = "nombre_del_servidor";
    $username = "nombre_de_usuario";
    $password = "contraseña";
    $dbname = "nombre_de_la_base_de_datos";

    // Conexión a la base de datos
    $conexion = new mysqli($servername, $username, $password, $dbname);

    // Verificar errores de conexión
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener los alumnos y su estatus
    $consulta = "SELECT nombre, apellido, estatus FROM usuarios WHERE rol = 'alumno'";

    // Ejecutar la consulta
    $resultados = $conexion->query($consulta);

    // Verificar si se obtuvieron resultados
    if ($resultados->num_rows > 0) {
        // Generar el contenido HTML dinámicamente
        echo '<ul>';
        while ($fila = $resultados->fetch_assoc()) {
            echo '<li>';
            echo $fila['nombre'] . ' ' . $fila['apellido'] . ' - Estatus: ' . $fila['estatus'];
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo 'No se encontraron alumnos.';
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    ?>

</body>
</html>
