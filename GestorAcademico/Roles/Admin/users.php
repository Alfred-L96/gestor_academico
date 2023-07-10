<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Mostrar imagenes</title>
<body>
    <center>
        <table border="2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre(s)</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Rol</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("../../Conexiones/bd.php");

                    $query = "SELECT * FROM usuarios";//Seleccionar la tabla de la BD
                    $resultado = $conexion->query($query); //Aplicamos el Query
                    //Se crea un while para mostrar las iimagenes guardadas en la base de datos
                    while($row = $resultado->fetch_assoc()){ 
                ?>
                <tr> 
                    <!--Aquie se generan las tablas donde mostramos ID, nombre  la imagen, 
                    asi como dos botones para modificar o eleiminar las imagenes -->
                    <td> <?php echo $row['Id']; ?> </td>
                    <td> <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['img']); ?>"/> </td>
                    <td> <?php echo $row['nombre']; ?> </td> 
                    <td> <?php echo $row['ap_pater']; ?> </td>
                    <td> <?php echo $row['ap_mater']; ?> </td>  
                    <td> <?php echo $row['rol']; ?> </td> 
                    <th> <a href="#"> Modificar </a></th>
                    <th> <a href="#"> Eliminar </a></th>
                </tr>

                <?php
                    }
                ?>
            </tbody>
        </table>
        <a href="alta_users.php"><button>Nuevo usuario</button></a>
    </center>
</body>
</html>