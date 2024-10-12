<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Política de Privacidad de la Liga de Fut 6 SSA.">
    <meta name="robots" content="index, follow">
    <title>Política de Privacidad - Liga de Fut 6 SSA</title>

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

    <!-- Sección de Política de Privacidad -->
    <main class="container mx-auto mt-12 px-4">
        <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Política de Privacidad</h2>
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <p class="text-lg text-gray-700 mb-4">
                En la Liga de Fut 6 SSA, nos tomamos muy en serio la privacidad de nuestros usuarios. A continuación, te
                explicamos cómo recopilamos, usamos y protegemos tu información personal.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">1. Información que recopilamos</h3>
            <p class="text-gray-600 mb-4">
                Durante el proceso de inscripción y participación en la liga, podemos recopilar los siguientes datos:
            </p>
            <ul class="list-disc list-inside mb-4 text-gray-600">
                <li>Nombre completo del usuario y capitán de equipo.</li>
                <li>Correo electrónico de contacto.</li>
                <li>Números de teléfono.</li>
                <li>Datos de los jugadores inscritos en el equipo.</li>
            </ul>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">2. Uso de la información</h3>
            <p class="text-gray-600 mb-4">
                La información que recopilamos es utilizada exclusivamente para gestionar las inscripciones y
                participación en la liga, así como para mantener informados a los participantes sobre el desarrollo de
                la competición.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">3. Protección de tus datos</h3>
            <p class="text-gray-600 mb-4">
                Implementamos medidas de seguridad adecuadas para proteger tu información personal. Sin embargo, es
                importante tener en cuenta que ninguna transmisión de datos a través de Internet es completamente
                segura.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">4. Compartir tu información</h3>
            <p class="text-gray-600 mb-4">
                No compartimos tu información personal con terceros, excepto cuando sea necesario para cumplir con la
                ley o en el caso de servicios esenciales como el procesamiento de pagos.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">5. Derechos del usuario</h3>
            <p class="text-gray-600 mb-4">
                Como usuario, tienes derecho a acceder, modificar o eliminar la información que tenemos sobre ti. Si
                deseas ejercer alguno de estos derechos, por favor contáctanos a través de nuestro correo electrónico.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">6. Cambios en la política</h3>
            <p class="text-gray-600 mb-4">
                Nos reservamos el derecho de modificar esta política de privacidad en cualquier momento. Cualquier
                cambio será notificado a través de nuestro sitio web.
            </p>

            <p class="text-gray-600 mb-4">
                Si tienes alguna pregunta o inquietud sobre nuestra política de privacidad, no dudes en ponerte en
                contacto con nosotros a través del correo <strong>privacidad@ligafut6ssa.com</strong>.
            </p>
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