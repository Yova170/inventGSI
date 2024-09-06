<?php
session_start();
$nombreu = $_SESSION['nombre'];
date_default_timezone_set('America/Panama');
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
    // Si no hay sesión activa, redirigir al usuario a la página de inicio de sesión
    header("Location: ../../index.php");
    exit();
}
?>
