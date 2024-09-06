<?php
// Conectar a la base de datos
require '../../conn.php';
require '../../session.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos del formulario
    $descripcion = trim($_POST['descripcion']);
    $marca = trim($_POST['marca']);
    $categoria = trim($_POST['categoria']);

    // Validar que todos los campos requeridos estén completos
    if (!empty($descripcion) && !empty($marca) && !empty($categoria)) {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO items (descripcion, marca, categoria) VALUES (?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Vincular los parámetros
            $stmt->bind_param("sss", $descripcion, $marca, $categoria);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir al usuario a una página de éxito o mostrar un mensaje
                header("Location: index.php"); // Cambia esto según sea necesario
                exit();
            } else {
                echo "Error: No se pudo guardar el ítem. Intenta nuevamente.";
            }
            
            // Cerrar la declaración
            $stmt->close();
        } else {
            echo "Error: No se pudo preparar la consulta SQL.";
        }
    } else {
        echo "Por favor, completa todos los campos requeridos.";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
