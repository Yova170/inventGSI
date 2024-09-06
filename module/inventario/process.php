<?php 
    require '../../conn.php'; // Asegúrate de tener la conexión a la base de datos
    require '../../session.php'; // Asegúrate de que la sesión esté iniciada

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
        if (count($nombres) === count($marcas) && count($marcas) === count($series) &&
            count($series) === count($activos) && count($activos) === count($detalles) &&
            count($detalles) === count($sucursales) && count($sucursales) === count($estados)) {
            
            // Preparar la consulta SQL
            $sql = "INSERT INTO detalle (item, nombre, marca, serie, activo, sucursal, estado, detalle, date, user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }

            echo "<h1>Equipos agregados:</h1>";
            echo "<ul>";

            // Iterar sobre los datos y ejecutar la consulta para cada conjunto de datos
            for ($i = 0; $i < count($nombres); $i++) {
                // Variables temporales
                $iditem = htmlspecialchars($iditems[$i]); // Si iditem no es un arreglo
                $nombre = htmlspecialchars($nombres[$i]);
                $marca = htmlspecialchars($marcas[$i]);
                $serie = htmlspecialchars($series[$i]);
                $activo = htmlspecialchars($activos[$i]);
                $detalle = htmlspecialchars($detalles[$i]);
                $sucursal = htmlspecialchars($sucursales[$i]);
                $estado = htmlspecialchars($estados[$i]);
                $fecha = date('d-m-Y H:i:s');
                $user = htmlspecialchars($_SESSION['nombre']);
            
                // Ejecutar la consulta
                $stmt->bind_param("ssssssssss", $iditem, $nombre, $marca, $serie, $activo, $sucursal, $estado, $detalle, $fecha, $user);
                if ($stmt->execute()) {
                    // Mostrar resultados en la página
                    echo "<li>";
                    echo "ID Item: $iditem<br>";
                    echo "Nombre: $nombre<br>";
                    echo "Marca: $marca<br>";
                    echo "Serie: $serie<br>";
                    echo "Activo: $activo<br>";
                    echo "Detalle: $detalle<br>";
                    echo "Sucursal: $sucursal<br>";
                    echo "Estado: $estado<br>";
                    echo "Fecha: $fecha<br>";
                    echo "Usuario: $user<br>";
                    echo "</li><br>";
                } else {
                    echo "Error al insertar los datos: " . $stmt->error . "<br>";
                }
            }
            

            echo "</ul>";

            // Cerrar la declaración
            $stmt->close();
            header("Location: detalle.php?id=" . urlencode($iditems[0]));
            exit();
        } else {
            echo "Error: El número de campos no coincide.";
        }
    } else {
        echo "No se han enviado datos.";
    }

    // Cerrar la conexión
    $conn->close();

?>