<?php 
require '../../conn.php';
require '../../session.php';
$nombreu = $_SESSION['nombre'];


// Evita el almacenamiento en caché de la página
header('Cache-Control: no-cache, must-revalidate'); // HTTP 1.1
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT'); // Fecha en el pasado
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada GSI-SERTRACEN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
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
</head>

<?php require "../nav.php"; ?>

<body>
    <div class='container mx-auto overflow-x-auto mt-20'>
        <?php
        // Verifica si hay un ID de ítem proporcionado
        if (isset($_GET['id']) || isset($_POST['id'])) {
            $iditem = isset($_GET['id']) ? $_GET['id'] : $_POST['id'];

            // Preparar la consulta para obtener los detalles del ítem
            $sql = "SELECT * FROM items WHERE iditem = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $iditem);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Verificar si se encontró el ítem
            if ($resultado->num_rows > 0) {
                $item = $resultado->fetch_assoc();

                // Mostrar la información del ítem
                echo "<h1 class='text-3xl mt-6 font-bold'>" . htmlspecialchars($item['descripcion']) . "</h1>";
                echo "<div class='mt-2'><p>Id: " . htmlspecialchars($iditem) . "</p></div>"; 

                // Consulta para obtener la cantidad de detalles
                $sql_count = "SELECT COUNT(*) as total FROM detalle WHERE nombre = ? AND (estado = 'nuevo' OR estado = 'usado')";
                $stmt_count = $conn->prepare($sql_count);

                if ($stmt_count === false) {
                    die('Error en la consulta SQL: ' . htmlspecialchars($conn->error));
                }

                // Asignar valores a los parámetros
                $nombre = $item['descripcion'];
                $stmt_count->bind_param("s", $nombre);
                $stmt_count->execute();
                $stmt_count->bind_result($total);
                $stmt_count->fetch();

                // Mostrar la cantidad de detalles
                echo "<p>Cantidad: " . htmlspecialchars($total) . "</p>";
                echo "<p>Marca: " . htmlspecialchars($item['marca']) . "</p>";
                echo "<p>Categoría: " . htmlspecialchars($item['categoria']) . "</p>";

                $stmt_count->close();
            } else {
                echo "<p>No se encontró el ítem.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>No se proporcionó ningún ID de ítem.</p>";
        }
        ?>

        <!-- Formulario para búsqueda -->
        <form action="detalle.php" method="post" class="flex mt-4 flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
            <input type="text" name="search" id="search" placeholder="Buscar en el inventario..." class="w-full md:w-64 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
            <select name="sucursal" class="w-full md:w-48 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                <option value="">Todas las Sucursales</option>
                <!-- Opciones de sucursales -->
                <option value="GPC">GPC</option>
                <option value="CVP">CVP</option>
                <option value="Albrook">Albrook</option>
                <option value="Chorrera">Chorrera</option>
                <option value="Las Tablas">Las Tablas</option>
                <option value="Colon">Colon</option>
                <option value="David">David</option>
                <option value="Penonome">Penonome</option>
                <option value="Santiago">Santiago</option>
                <option value="Chitre">Chitre</option>
            </select>
            <select name="estado" class="w-full md:w-48 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                <option value="">Cualquier Estado</option>
                <!-- Opciones de estado -->
                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
                <option value="Descartado">Descartado</option>
            </select>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($iditem); ?>"> <!-- ID oculto -->
            <button type="submit" class="btn-search">
                <img src="../../resource/objets/cuadrado.png" alt="Buscar" style="width: 40px; height: 40px;" />
            </button>
            <button type="button" onclick="window.location.href='agre.php?id=<?php echo $iditem; ?>'" class="w-full md:w-auto px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">
                Agregar Equipo
            </button>
        </form>

        <?php
        // Procesar la búsqueda
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $iditem = $_POST['id'];
            $search = isset($_POST['search']) ? $_POST['search'] : '';
            $sucursal = isset($_POST['sucursal']) ? $_POST['sucursal'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';

            // Construir la consulta SQL dinámicamente
            $sql = "SELECT * FROM detalle WHERE item = ?";
            $params = [$iditem];
            $types = "i";

            if (!empty($search)) {
                $sql .= " AND (serie LIKE ? OR activo LIKE ?)";
                $search_param = "%" . $search . "%";
                $params[] = $search_param;
                $params[] = $search_param;
                $types .= "ss";
            }

            if (!empty($sucursal)) {
                $sql .= " AND sucursal = ?";
                $params[] = $sucursal;
                $types .= "s";
            }

            if (!empty($estado)) {
                $sql .= " AND estado = ?";
                $params[] = $estado;
                $types .= "s";
            }

            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . $conn->error);
            }
            $stmt->bind_param($types, ...$params);
            $stmt->execute();
            $resultado = $stmt->get_result();

            // Mostrar resultados
            if ($resultado->num_rows > 0) {
                echo '<div class="overflow-y-auto max-h-72"> <!-- Ajusta la altura según necesites -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="sticky top-0 bg-gray-50 z-10">
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serie</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activo</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sucursal</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detalle</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">';

                while ($fila = $resultado->fetch_assoc()) {
                    echo '
                        <tr class="hover:bg-gray-100 cursor-pointer" onclick="window.location.href=\'detalle_item.php?id=' . htmlspecialchars($fila['iditems']) . '\'">
                            <td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['serie']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['activo']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['sucursal']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['detalle']) . '</td>
                            <td class="px-6 py-4 whitespace-nowrap">' . htmlspecialchars($fila['estado']) . '</td>
                        </tr>';
                }

                echo '</tbody></table></div>';
            } else {
                echo '<p class="text-center text-gray-500 mt-4">No se encontraron resultados.</p>';
            }

            $stmt->close();
        }
        ?>
    </div>
</body>
</html>
