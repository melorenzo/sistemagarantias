<?php
// Inicia la sesión si aún no está iniciada
session_start();

// Desvincula todas las variables de sesión
session_unset();

// Destruye la sesión actual
session_destroy();

// Elimina la cookie de sesión en el lado del cliente
setcookie(session_name(), '', time() - 3600, '/');

// Redirige al usuario a la página de inicio
header("HTTP/1.1 302 Moved Temporarily"); 
header("Location: index.php"); 
?>
