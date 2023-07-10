<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"
    <title>Alta de usuarios</title>
</head>
<body>
    <h1>Alta de usuarios</h1>

    <form action="alta.php" method="post" enctype="multipart/form-data">
        <label for="usuario">Correo:</label>
        <input type="text" name="correo" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="pw" required><br>

        <label for="nombre">Nombre(s):</label>
        <input type="text" name="nombre" required><br>

        <label for="apellido">Apellido paterno:</label>
        <input type="text" name="ap_pat" required><br>

        <label for="apellido">Apellido materno:</label>
        <input type="text" name="ap_mat" required><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" required><br>

        <label for="rol">Rol:</label>
        <select name="rol">
            <option value="Maestro">Maestro</option>
            <option value="Psicologo">Psicólogo</option>
            <option value="Alumno">Alumno</option>
            <option value="Direccion">Dirección</option>
            <option value="Escolares">Escolares</option>
        </select><br>

        <input type="submit" value="Registrar usuario">
    </form>
    <a href="users.php"><button>Ver usuarios</button></a>
</body>
</html>


