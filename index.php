<?php 
require 'conn.php';

session_start();
if (isset($_SESSION['user'])) {
    // Si no hay sesión activa, redirigir al usuario a la página de inicio de sesión
    header("Location: module/home/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['password'];

    // Consulta SQL para verificar usuario y contraseña
    $sql = "SELECT * FROM usuario WHERE user = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario y contraseña correctos
        $userData = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        $_SESSION['nombre'] = $userData['name'];
        header("Location: module/home/index.php");
        exit();
    } else {
        // Usuario o contraseña incorrectos
        header("Location: index.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario GSI-SERTRACEN</title>
    <link rel="icon" href="resource/logos/min.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-slate-200 dark:bg-gray-900">
    <section >
    <div class="flex flex-col items-center justify-center  mx-auto md:h-screen lg:py-0">
        <img class="mb-8" src="resource/logos/logo.png" alt="logo">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Iniciar Sesion
                </h1>
                <form class="space-y-4 md:space-y-6" method="post" action="">
                    <div>
                        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                        <input type="text" name="user" id="user" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="User" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="ml-3 text-sm">
                                <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Olvido Contraseña?</a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar Sesion</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        No tiene cuenta? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Contactar</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
    </section>
</body>
</html>

