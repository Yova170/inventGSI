<?php
require '../../conn.php';
require '../../session.php';

// Comprueba si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $iditems = $_POST['iditem'];
    $nombres = $_POST['nombre_equipo'];
    $marcas = $_POST['marca_equipo'];
    $series = $_POST['series'];
    $activos = $_POST['activos'];
    $detalles = $_POST['detalle'];
    $sucursales = $_POST['sucursales'];
    $estados = $_POST['estados'];

    // Verificar si los datos existen y tienen el mismo tamaño
    if (count($nombres) === count($marcas) && count($marcas) === count($series)) {
        echo "<h1>Equipos agregados:</h1>";
        echo "<ul>";

        // Iterar sobre los datos y mostrarlos
        for ($i = 0; $i < count($nombres); $i++) {
            echo "<li>";
            echo "ID Item: " . htmlspecialchars($iditems[0]) . "<br>";
            echo "Nombre: " . htmlspecialchars($nombres[$i]) . "<br>";
            echo "Marca: " . htmlspecialchars($marcas[$i]) . "<br>";
            echo "Serie: " . htmlspecialchars($series[$i]) . "<br>";
            echo "Activo: " . htmlspecialchars($activos[$i]) . "<br>";
            echo "Detalle: " . htmlspecialchars($detalles[$i]) . "<br>";
            echo "Sucursal: " . htmlspecialchars($sucursales[$i]) . "<br>";
            echo "Estado: " . htmlspecialchars($estados[$i]) . "<br>";
            echo "</li><br>";
        }

        echo "</ul>";
    } else {
        echo "Error: El número de campos no coincide.";
    }
} else {
    echo "No se han enviado datos.";
}
?>
