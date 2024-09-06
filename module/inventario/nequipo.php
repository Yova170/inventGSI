<?php 
    require '../../conn.php';
    echo '<script src="https://cdn.tailwindcss.com"></script>';
    require '../../session.php';
    // Evita el almacenamiento en caché de la página
    header('Cache-Control: no-cache, must-revalidate'); // HTTP 1.1
    header('Expires: Thu, 01 Jan 1970 00:00:00 GMT'); 
?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nuevos Equipo GSI-SERTRACEN</title>
            <link rel="icon" href="../../resource/logos/min.png" type="image/x-icon">
            <script src="https://cdn.tailwindcss.com"></script>
        </head>

        <?php require "../nav.php"?>
 
        <body class="bg-gray-100 mt-20">
            <div class="mt-5 max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-center">Agregar Ítem</h2>
                <form action="nprocess.php" method="POST">

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>

                    <!-- Marca -->
                    <div class="mb-4">
                        <label for="marca" class="block text-sm font-medium text-gray-700" require>Marca</label>
                        <input type="text" name="marca" id="marca" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    </div>

                      <!-- Categoría (Lista Desplegable) -->
                    <div class="mb-4">
                        <label for="categoria" class="block text-sm font-medium text-gray-700" require>Categoría</label>
                        <select name="categoria" id="categoria" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <option value="" disabled selected>Selecciona una categoría</option>
                            <option value="Cámara de Seguridad">Cámara de Seguridad</option>
                            <option value="Accesorios">Accesorios</option>
                            <option value="Otros">Otros</option>
                            <option value="Perifericos">Perifericos</option>
                            <option value="Simulador">Simulador</option>
                            <option value="Tablets">Tablets</option>
                            <option value="PC">PC</option>
                            <option value="Fargo">Fargo</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Agregar Ítem</button>
                    </div>
                </form>
            </div>
        </body>
    </html>