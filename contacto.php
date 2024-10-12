<?php
session_start();

// Variable para el mensaje de éxito o error
$success_message = "";
$error_message = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Validar los campos
    if (!empty($nombre) && !empty($email) && !empty($mensaje) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Enviar el correo
        $para = "contacto@ligafut6ssa.com"; // Cambia esto por el correo al que quieres que lleguen las consultas
        $asunto = "Nuevo mensaje de contacto de: $nombre";
        $cuerpo = "Has recibido un nuevo mensaje de contacto:\n\n";
        $cuerpo .= "Nombre: $nombre\n";
        $cuerpo .= "Email: $email\n";
        $cuerpo .= "Mensaje: \n$mensaje\n";

        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";

        if (mail($para, $asunto, $cuerpo, $headers)) {
            $success_message = "Tu mensaje ha sido enviado con éxito.";
        } else {
            $error_message = "Hubo un error al enviar tu mensaje. Inténtalo nuevamente.";
        }
    } else {
        $error_message = "Por favor, completa todos los campos correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contacto con la Liga de Fut 6 SSA. Envíanos tus consultas.">
    <meta name="robots" content="index, follow">
    <title>Contacto - Liga de Fut 6 SSA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="text-3xl font-bold hover:text-yellow-300 transition duration-300">Liga de Fut 6 SSA</h1>
            </div>

            <!-- Menú de navegación -->
            <nav class="hidden md:flex space-x-6" aria-label="Menú de navegación">
                <a href="index.php" class="hover:text-yellow-300 transition duration-300">Inicio</a>
                <a href="equipos.php" class="hover:text-yellow-300 transition duration-300">Equipos</a>
                <a href="jornadas.php" class="hover:text-yellow-300 transition duration-300">Jornadas</a>
                <a href="estadisticas.php" class="hover:text-yellow-300 transition duration-300">Estadísticas</a>
                <a href="informacion.php" class="hover:text-yellow-300 transition duration-300">Información</a>
                <a href="inscripcion.php" class="hover:text-yellow-300 transition duration-300">Inscripción</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="hover:text-yellow-300 transition duration-300">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="hover:text-yellow-300 transition duration-300">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Sección de Contacto -->
    <main class="container mx-auto mt-12 px-4">
        <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Contacto</h2>
        <p class="text-lg text-center text-gray-600 mb-8">
            Si tienes alguna consulta, no dudes en ponerte en contacto con nosotros utilizando el siguiente formulario.
        </p>

        <!-- Formulario de Contacto -->
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <?php if ($success_message): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                <?php echo $success_message; ?>
            </div>
            <?php elseif ($error_message): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                <?php echo $error_message; ?>
            </div>
            <?php endif; ?>

            <form action="contacto.php" method="POST">
                <div class="mb-6">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <div class="mb-6">
                    <label for="mensaje" class="block text-gray-700 font-bold mb-2">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Enviar
                        Mensaje</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Liga de Fut 6 SSA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>