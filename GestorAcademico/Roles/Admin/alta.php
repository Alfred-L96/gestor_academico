<?php
    include("../../Conexiones/bd.php");

    $correo =$_POST['correo']; //Da nombre al archivo
    $password =$_POST['pw'];
    $nombre =$_POST['nombre'];
    $ap_pat =$_POST['ap_pat'];
    $ap_mat =$_POST['ap_mat'];
    $imagen =addslashes(file_get_contents($_FILES['foto']['tmp_name'])); //Agregar la imagen a MYSQL
    $rol =$_POST["rol"];
    $query = "INSERT INTO usuarios(correo,pw,nombre,ap_pater,ap_mater,img,rol) VALUES ('$correo','$password','$nombre','$ap_pat','$ap_mat','$imagen','$rol')"; //Query para subir los datos
    $resultado = $conexion->query($query); 

    if($resultado){
        echo "Imagen guardada exitosamente";
    }
    else{
        echo "Error, imagen no guardada";;

    }

?>