<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
</head>
<body>
    <h1>Inicio de sesión</h1>

    <?php
    include("Conexiones/bd.php");
    // Verifica si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtiene los datos ingresados por el usuario
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Consulta para verificar las credenciales del usuario
        $consulta = "SELECT * FROM prueba WHERE user = '$usuario' AND pw = '$contrasena'";
        $resultado = $conexion->query($consulta);

        // Verifica si se encontró un usuario con las credenciales ingresadas
        if ($resultado->num_rows == 1) {
            // Obtiene el rol del usuario
            $fila = $resultado->fetch_assoc();
            $rol = $fila["rol"];

            // Realiza acciones según el rol del usuario
            switch ($rol) {
                case 'admin':
                    // Acciones específicas para el rol de maestro
                    header("Location: Roles/Admin/alta_users.php");
                    break;
                case 'Maestro':
                    // Acciones específicas para el rol de maestro
                    header("Location: Roles/maestro.php");
                    break;
                case 'Psicologo':
                    // Acciones específicas para el rol de psicólogo
                    header("Location: Roles/psicologo.php");
                    break;
                case 'Alumno':
                    // Acciones específicas para el rol de alumno
                    header("Location: Roles/alumnos.php");
                    break;
                case 'Direccion':
                    // Acciones específicas para el rol de dirección
                    header("Location: Roles/direccion.php");
                    break;
                case 'Escolares':
                    // Acciones específicas para el rol de escolares
                    header("Location: Roles/escolares.php");
                    break;
                default:
                    // Rol desconocido, muestra un mensaje de error
                    echo "Rol de usuario desconocido.";
                    break;
            }
        } else {
            // Usuario inválido, muestra un mensaje de error
            echo "Credenciales inválidas.";
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
