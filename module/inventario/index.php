<?php
    require '../../conn.php';
    require '../../session.php';
    echo '<script src="https://cdn.tailwindcss.com"></script>';
    include '../../form.js';
    $nombreu = $_SESSION['nombre'];
    // Evita el almacenamiento en caché de la página
    header('Cache-Control: no-cache, must-revalidate'); // HTTP 1.1
    header('Expires: Thu, 01 Jan 1970 00:00:00 GMT'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario GSI-SERTRACEN</title>
    <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
    <link rel="stylesheet" href="../../styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('form input, form select');
            
            // Restaurar valores
            formElements.forEach(element => {
                const savedValue = localStorage.getItem(element.name);
                if (savedValue) {
                    element.value = savedValue;
                }
            });
            
            // Guardar valores al cambiar
            formElements.forEach(element => {
                element.addEventListener('change', function() {
                    localStorage.setItem(element.name, element.value);
                });
            });

            // Limpiar almacenamiento local cuando se envíe el formulario
            document.querySelector('form').addEventListener('submit', function() {
                formElements.forEach(element => {
                    localStorage.removeItem(element.name);
                });
            });
        });
    </script>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1rem;
        }

        .pagination a {
            padding: 0.5rem 1rem;
            margin: 0.2rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-decoration: none;
        }

        .pagination a.active {
            background-color: #ddd;
        }
    </style>
</head>
<?php require "../nav.php"; 
echo "<script> console.log(' $nombreu') </script>" ?>


<div class="flex justify-center mt-20">
    <form action="" method="post" class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
        <input type="text" name="search" id="search" placeholder="Buscar en el inventario..." class="w-full md:w-64 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
        <select name="categoria" class="w-full md:w-48 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            <option value="">Todas las categorías</option>
            <option value="Cámara de Seguridad">Cámara de Seguridad</option>
            <option value="Accesorios">Accesorios</option>
            <option value="Otros">Otros</option>
            <option value="Perifericos">Perifericos</option>
            <option value="Simulador">Simulador</option>
            <option value="Tablets">Tablets</option>
            <option value="PC">PC</option>
            <option value="Fargo">Fargo</option>
            <!-- Agrega más opciones según tus categorías -->
        </select>

        <button type="submit" class="btn-search">
            <img src="../../resource/objets/cuadrado.png" alt="Buscar" style="width: 40px; height: 40px;" />
        </button>
        <a href="nequipo.php" >
            <img src="../../resource/objets/add.png" alt="Buscar" style="width: 40px; height: 40px;" />    
 
        </a>
    </form>
</div>

<body>
    <div  class="container mx-auto overflow-x-auto">
    <?php
    // Parámetros de paginación
    $items_por_pagina = 50;
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $inicio = ($pagina_actual - 1) * $items_por_pagina;

    // Verificar si se ha realizado una búsqueda
    $search = isset($_POST['search']) ? $_POST['search'] : '';
    $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
    
    // Construir la consulta SQL dinámicamente
    $sql = "SELECT * FROM items WHERE 1=1";  // 1=1 es un truco para facilitar la construcción de la consulta
    
    $params = [];
    $types = "";
    
    // Agregar filtros si están definidos
    if (!empty($search)) {
        $sql .= " AND (descripcion LIKE ? OR marca LIKE ? OR categoria LIKE ?)";
        $search_param = "%" . $search . "%";
        $params = array_merge($params, [$search_param, $search_param, $search_param]);
        $types .= "sss";  // Aquí corregimos a tres "s"
    }
    
    if (!empty($categoria)) {
        $sql .= " AND categoria = ?";
        $params[] = $categoria;
        $types .= "s";
    }
    
    $sql .= " LIMIT ?, ?";
    $params[] = $inicio;
    $params[] = $items_por_pagina;
    $types .= "ii";  // Parámetros enteros para la paginación
    
    // Preparar la consulta
    $stmt = $conn->prepare($sql);
    
    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }
    
    // Vincular los parámetros
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    
    $resultado = $stmt->get_result();

    // Almacenar los nombres de los items
    $itemNames = [];
    while ($fila = $resultado->fetch_assoc()) {
        $itemNames[] = $fila['descripcion'];
    }

    // Si hay items, cargar sus cuentas en una sola consulta
    $counts = [];
    if (count($itemNames) > 0) {
        $placeholders = implode(',', array_fill(0, count($itemNames), '?'));
        $sql1 = "SELECT nombre, COUNT(*) as total FROM detalle WHERE nombre IN ($placeholders) AND (estado = 'nuevo' OR estado = 'usado') GROUP BY nombre";
        $stmt1 = $conn->prepare($sql1);

        if ($stmt1 === false) {
            die('Error en la consulta SQL: ' . htmlspecialchars($conn->error));
        }

        $stmt1->bind_param(str_repeat('s', count($itemNames)), ...$itemNames);
        $stmt1->execute();
        $resultado1 = $stmt1->get_result();

        while ($row = $resultado1->fetch_assoc()) {
            $counts[$row['nombre']] = $row['total'];
        }
    }

    // Crear la tabla HTML
    if (count($itemNames) > 0) {
        echo '<div class="overflow-y-auto max-h-96">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="sticky top-0 bg-gray-50 z-10">
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">IDITEM</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Articulo</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">';

        // Restablecer el puntero de resultados para iterar de nuevo
        $resultado->data_seek(0);

        while ($fila = $resultado->fetch_assoc()) {
            $nombre = $fila['descripcion'];
            $total = $counts[$nombre] ?? 0;
            
            echo '
                <tr class="hover:bg-gray-100 cursor-pointer" onclick="window.location.href=\'detalle.php?id=' . $fila['iditem'] . '\'">
                    <td class="px-6 py-4 whitespace-nowrap">' . $fila['iditem'] . '</td>
                    <td class="px-6 py-4 whitespace-nowrap">' . $total . '</td>
                    <td class="px-6 py-4 whitespace-nowrap">' . $fila['descripcion'] . '</td>
                    <td class="px-6 py-4 whitespace-nowrap">' . $fila['marca'] . '</td>
                    <td class="px-6 py-4 whitespace-nowrap">' . $fila['categoria'] . '</td>
                </tr>';
        }

        echo '
                </tbody>
            </table>
        </div>';

        // Calcular el total de páginas
        if (!empty($search)) {
            $sql_total_registros = "SELECT COUNT(*) FROM items WHERE descripcion LIKE ? OR marca LIKE ? OR categoria LIKE ?";
            $stmt_total = $conn->prepare($sql_total_registros);
            $stmt_total->bind_param("sss", $search_param, $search_param, $search_param);
        } else {
            $sql_total_registros = "SELECT COUNT(*) FROM items";
            $stmt_total = $conn->prepare($sql_total_registros);
        }

        $stmt_total->execute();
        $total_registros = $stmt_total->get_result()->fetch_row()[0];
        $total_paginas = ceil($total_registros / $items_por_pagina);

        // Generar los enlaces de paginación
        if ($total_paginas > 1) {
            echo '<div class="pagination">';
            for ($i = 1; $i <= $total_paginas; $i++) {
                $active_class = ($i == $pagina_actual) ? 'active' : '';
                echo '<a href="?pagina=' . $i . '" class="' . $active_class . '">' . $i . '</a>';
            }
            echo '</div>';
        }
    } else {
        echo '<p class="text-center text-gray-500 mt-4">No se encontraron resultados.</p>';
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
    ?>
</div>
</body>
</html>

