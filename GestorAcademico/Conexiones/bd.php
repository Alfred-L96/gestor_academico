<?php
$conexion = new mysqli("localhost","root","","prueba");

if($conexion){
    echo "Conexion exitosa";
}
else{
    echo "Conexion no exitosa";
}

?>