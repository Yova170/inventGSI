<?php 
require '../../conn.php';
require '../../session.php';

// Obtener el nombre y la marca del equipo basado en el iditem
if (isset($_GET['id'])) {
    $iditem = $_GET['id'];
    $sql = "SELECT descripcion, marca FROM items WHERE iditem = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $iditem);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $item = $resultado->fetch_assoc();
        $nombreEquipo = $item['descripcion'];
        $marcaEquipo = $item['marca'];
    } else {
        $nombreEquipo = "Equipo Desconocido";
        $marcaEquipo = "Marca Desconocida";
    }
    $stmt->close();
} else {
    $nombreEquipo = "Equipo no especificado";
    $marcaEquipo = "Marca no especificada";
}

// Obtener la cantidad de equipos en estado 'nuevo' o 'usado'
$sql_count = "SELECT COUNT(*) as total FROM detalle WHERE nombre = ? AND (estado = 'nuevo' OR estado = 'usado')";
$stmt_count = $conn->prepare($sql_count);

if ($stmt_count === false) {
    die('Error en la consulta SQL: ' . htmlspecialchars($conn->error));
}

// Asignar valores a los parámetros
$stmt_count->bind_param("s",  $nombreEquipo);
$stmt_count->execute();
$stmt_count->bind_result($total);
$stmt_count->fetch();
$stmt_count->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Equipos - <?php echo htmlspecialchars($nombreEquipo); ?></title>
    <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addButton = document.getElementById('addRow');
            const equipmentContainer = document.getElementById('equipmentContainer');

            if (!addButton || !equipmentContainer) {
                console.error('Error: Botón o contenedor no encontrado en el DOM.');
                return;
            }
            console.log('<?php echo $total?>');
            const nombreEquipo = "<?php echo htmlspecialchars($nombreEquipo); ?>";
            const marcaEquipo = "<?php echo htmlspecialchars($marcaEquipo); ?>";
            const iditem = "<?php echo htmlspecialchars($iditem); ?>";
            document.addEventListener('click', function(e) {
                if (e.target && e.target.name == 'delete[]') {
                    e.target.parentElement.remove();
                }
            });


            addButton.addEventListener('click', function() {
                const newRow = document.createElement('div');
                newRow.className = 'flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-4';

                newRow.innerHTML = `
                    <input type="hidden" name="iditem[]" value="${iditem}">
                    <input type="text" name="nombre_equipo[]" required value="${nombreEquipo}" readonly class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 bg-gray-100">
                    <input type="text" name="marca_equipo[]" required value="${marcaEquipo}" readonly class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 bg-gray-100">
                    <input type="text" name="series[]" required placeholder="Serie" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" name="activos[]" required placeholder="Activo" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" name="detalle[]" required placeholder="Detalle" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <select name="sucursales[]" required class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                        <option value="" disabled selected>Sucursal</option>
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
                    <select name="estados[]" required class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                        <option value="" disabled selected>Estado</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                        <option value="Descartado">Descartado</option>
                    </select>
                    <button type="button" name="delete[]" id="delete" class="mt-4 px-1 py-2 bg-red-300 text-white rounded-md hover:bg-red-400">Eliminar</button>
                `;

                equipmentContainer.appendChild(newRow);
            });
        });
    </script>
</head>
<body>
    <?php require "../nav.php"; ?>
    <div class='container mx-auto mt-16'>
        <h1 class='text-3xl mt-6 font-bold'>Agregar Equipos: <?php echo htmlspecialchars($nombreEquipo); ?></h1>
        <h1 class='text-1xl mt-6 font-bold'>Cantidad actual: <?php echo htmlspecialchars($total); ?></h1>
        <h1 class='text-1xl font-bold'>ID Item: <?php echo htmlspecialchars($iditem); ?></h1>
        
        <form action="process.php" method="post">
            <div id="equipmentContainer">
                <!-- Primera fila de formulario -->
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mt-4">
                    <input type="hidden" name="iditem[]" value="<?php echo $iditem; ?>">
                    <input type="text" name="nombre_equipo[]" value="<?php echo htmlspecialchars($nombreEquipo); ?>" readonly class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 bg-gray-100">
                    <input type="text" name="marca_equipo[]" value="<?php echo htmlspecialchars($marcaEquipo); ?>" readonly class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 bg-gray-100">
                    <input type="text" maxlength="30" required name="series[]" placeholder="Serie" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required name="activos[]" placeholder="Activo" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <input type="text" maxlength="20" required name="detalle[]" placeholder="Detalle" class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                    <select name="sucursales[]" required class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                        <option value="" disabled selected>Sucursal</option>
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
                    <select name="estados[]" required class="w-full md:w-1/4 px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-500">
                        <option value="" disabled selected>Estado</option>
                        <option value="Nuevo">Nuevo</option>
                        <option value="Usado">Usado</option>
                        <option value="Descartado">Descartado</option>
                    </select>
                </div>
            </div>
            
            <!-- Botón para agregar más equipos -->
            <button type="button" id="addRow" class="mt-4 ml-4 px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">Agregar otro equipo</button>
            
            <!-- Botón para enviar -->
            <button type="submit" class="mt-4 ml-2 px-4 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-700">Enviar</button>
        </form>
    </div>
</body>
</html>
