<!DOCTYPE html>
<html>
<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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

 <div class="login-container">
        <div class="login-box">
            <h1>Iniciar sesión</h1>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label>Usuario:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <?php if (isset($error_message)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <input type="submit" name="submit" value="Iniciar sesión" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
