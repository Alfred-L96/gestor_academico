<?php
// Iniciar o reanudar la sesión
session_start();

// Establecer el tiempo de expiración de la sesión en segundos (por ejemplo, 30 minutos)
$tiempoExpiracion = 1800; // 30 minutos

// Verificar si la sesión está activa y si ha transcurrido el tiempo de expiración
if (isset($_SESSION['ultimoAcceso']) && (time() - $_SESSION['ultimoAcceso']) > $tiempoExpiracion) {
    // La sesión ha expirado, destruir la sesión actual
    session_unset();
    session_destroy();
    // Redireccionar a una página de inicio de sesión o a una página de sesión expirada
    header("Location: login.php");
    exit();
}

// Actualizar el tiempo de último acceso
$_SESSION['ultimoAcceso'] = time();

// Resto del código de tu página...
?>
