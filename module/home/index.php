<?php 
require '../../conn.php';
echo '<script src="https://cdn.tailwindcss.com"></script>';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home GSI-SERTRACEN</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
    </head>

   <?php require "../nav.php"?>

    <body>
    <div class='container mx-auto overflow-x-auto mt-10'>
        <h1 class='text-3xl font-bold mb-6'>Últimos Productos Agregados</h1>

        <?php
            // Consulta para obtener los últimos 5 productos agregados
            $sql = "SELECT * FROM detalle ORDER BY iditems DESC LIMIT 5";
            $resultado = $conn->query($sql);

            // Verificar si se encontraron productos
            if ($resultado && $resultado->num_rows > 0) {
                echo '<table class="min-w-full divide-y divide-gray-200">';
                echo '<thead class="bg-gray-50">';
                echo '<tr>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serie</th>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activo</th>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>';
                echo '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody class="bg-white divide-y divide-gray-200">';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr class="hover:bg-gray-100 cursor-pointer" onclick="window.location.href=\'../inventario/detalle_item.php?id=' . $fila['iditems'] . '\'">';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['nombre']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['marca']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['serie']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['activo']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['date']) . '</td>';
                    echo '<td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['user']) . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p class="text-center text-gray-500 mt-4">No se encontraron productos recientes.</p>';
            }

            $conn->close();
        ?>
    </div>
    </body>
</html>