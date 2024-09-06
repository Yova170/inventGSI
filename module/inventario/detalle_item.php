<?php 
require '../../conn.php';
require '../../session.php';
include '../../form.js'
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GSI-SERTRACEN</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
    </head>
    <?php require "../nav.php" ?>
    <body>
    <div class='container mx-auto overflow-x-auto mt-20'>
        <?php
        // Verifica si hay un ID de ítem proporcionado
        if (isset($_GET['id']) || isset($_POST['id'])) {
            $iditem = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

            // Preparar la consulta para obtener los detalles del ítem
            $sql = "SELECT * FROM detalle WHERE iditems = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $iditem);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Verificar si se encontró el ítem
            if ($resultado->num_rows > 0) {
                $item = $resultado->fetch_assoc();
                // Mostrar la información del ítem
                echo "<h1 class='text-3xl mt-6 font-bold'> Articulo: " . $item['nombre'] . "</h1>";
                echo "<h1> Id: " . $item['iditems'] . "</h1>";
                echo "<p>Nombre: " . $item['nombre'] . "</p>";
                echo "<p>Marca: " . $item['marca'] . "</p>";
                echo "<p>Serie: " . $item['serie'] . "</p>";
                echo "<p>Activo: " . $item['activo'] . "</p>";
                echo "<p>Sucursal: " . $item['sucursal'] . "</p>";
                echo "<p>Estado: " . $item['estado'] . "</p>";
                echo "<p>Ingresado por: " . $item['user'] . "</p>";
                echo "<p>Fecha de Ingreso: " . $item['date'] . "</p>";
            } else {
                echo "<p>No se encontró el ítem.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No se proporcionó ningún ID de ítem.</p>";
        }
        ?>
    </body>
</HTML>