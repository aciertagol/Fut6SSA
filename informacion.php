<?php
session_start();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Información sobre la Liga de Fut 6 SSA. Reglas, cómo inscribirse y más detalles.">
    <meta name="keywords" content="Futbol 6, Información, Liga, Inscripción, Reglas">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Liga de Fut 6 SSA - Información">
    <meta property="og:description"
        content="Consulta toda la información sobre la Liga de Fut 6 SSA: reglas, cómo inscribirse, fechas importantes y más.">
    <meta property="og:image" content="images/informacion_banner.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tuliga.com/informacion.php">

    <title>Información - Liga de Fut 6 SSA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal overflow-x-hidden">
    <!-- Header (navbar) -->
    <header class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <div class="flex items-center">
                <a href="index.php" class="flex items-center">
                    <img src="images/logotipo.png" alt="Logotipo Liga Fut6"
                        class="h-12 mr-3 transition-transform duration-500 hover:scale-110">
                    <h1 class="text-3xl font-bold hover:text-yellow-300 transition duration-300">Liga de Fut 6 SSA</h1>
                </a>
            </div>

            <nav class="hidden md:flex space-x-6" aria-label="Menú de navegación">
                <a href="index.php" class="nav-link hover:text-yellow-300 transition duration-300">Inicio</a>
                <a href="equipos.php" class="nav-link hover:text-yellow-300 transition duration-300">Equipos</a>
                <a href="jornadas.php" class="nav-link hover:text-yellow-300 transition duration-300">Jornadas</a>
                <a href="estadisticas.php"
                    class="nav-link hover:text-yellow-300 transition duration-300">Estadísticas</a>
                <a href="informacion.php" class="nav-link hover:text-yellow-300 transition duration-300">Información</a>
                <a href="inscripcion.php" class="nav-link hover:text-yellow-300 transition duration-300">Inscripción</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="hover:text-yellow-300 transition duration-300">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="hover:text-yellow-300 transition duration-300">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>

            <!-- Botón para menú móvil -->
            <button id="menuToggle" class="md:hidden text-4xl focus:outline-none" aria-label="Abrir menú de navegación">
                <span class="material-icons" aria-hidden="true">menu</span>
            </button>
        </div>

        <!-- Menú móvil (inicialmente oculto) -->
        <div id="mobileMenu" class="bg-blue-700 text-white p-4 md:hidden fixed inset-0 top-16 hidden z-40">
            <nav class="flex flex-col space-y-4" aria-label="Menú móvil">
                <a href="index.php" class="nav-link hover:text-yellow-300 transition duration-300">Inicio</a>
                <a href="equipos.php" class="nav-link hover:text-yellow-300 transition duration-300">Equipos</a>
                <a href="jornadas.php" class="nav-link hover:text-yellow-300 transition duration-300">Jornadas</a>
                <a href="estadisticas.php"
                    class="nav-link hover:text-yellow-300 transition duration-300">Estadísticas</a>
                <a href="informacion.php" class="nav-link hover:text-yellow-300 transition duration-300">Información</a>
                <a href="inscripcion.php" class="nav-link hover:text-yellow-300 transition duration-300">Inscripción</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="hover:text-yellow-300 transition duration-300">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="hover:text-yellow-300 transition duration-300">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Sección Principal de Información -->
    <main>
        <section class="container mx-auto mt-12 px-4">
            <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Información sobre la Liga</h2>
            <p class="text-lg text-center text-gray-600 mb-8">
                Aquí encontrarás toda la información necesaria sobre la Liga de Fut 6 SSA, incluyendo reglas,
                inscripción y fechas importantes.
            </p>

            <!-- Información sobre la Liga -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Reglas Generales -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Reglas Generales</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li>Los partidos se juegan con equipos de 6 jugadores en cancha.</li>
                        <li>Los partidos tienen una duración de 40 minutos (dos tiempos de 20 minutos).</li>
                        <li>Se permiten cambios ilimitados.</li>
                        <li>El uso de espinilleras es obligatorio para todos los jugadores.</li>
                        <li>Las tarjetas amarillas y rojas siguen las reglas oficiales de fútbol.</li>
                    </ul>
                </div>

                <!-- Inscripción -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Cómo Inscribirse</h3>
                    <p class="text-gray-600 mb-4">Para inscribirte en la Liga de Fut 6 SSA, sigue estos pasos:</p>
                    <ol class="list-decimal list-inside text-gray-600">
                        <li>Completa el formulario de inscripción en la página de <a href="inscripcion.php"
                                class="text-blue-500 hover:underline">Inscripción</a>.</li>
                        <li>Paga la cuota de inscripción para confirmar tu participación.</li>
                        <li>Recibirás un correo electrónico con la confirmación de tu inscripción.</li>
                        <li>Reúne a tu equipo y prepárate para competir.</li>
                    </ol>
                </div>

                <!-- Fechas Importantes -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Fechas Importantes</h3>
                    <ul class="list-disc list-inside text-gray-600">
                        <li><strong>Inicio de la Liga:</strong> 15 de Octubre de 2024</li>
                        <li><strong>Cierre de Inscripciones:</strong> 10 de Octubre de 2024</li>
                        <li><strong>Final de Temporada:</strong> 15 de Diciembre de 2024</li>
                        <li><strong>Entrega de Trofeos:</strong> 18 de Diciembre de 2024</li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                    <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Contacto</h3>
                    <p class="text-gray-600 mb-4">Si tienes alguna duda o consulta, no dudes en ponerte en contacto con
                        nosotros:</p>
                    <ul class="text-gray-600">
                        <li><strong>Teléfono:</strong> +52 987 654 3210</li>
                        <li><strong>Email:</strong> <a href="mailto:contacto@ligafut6ssa.com"
                                class="text-blue-500 hover:underline">contacto@ligafut6ssa.com</a></li>
                        <li><strong>Oficina:</strong> Calle Fútbol 456, Ciudad Deportiva, México</li>
                    </ul>
                </div>
            </div>

            <!-- Formulario de Contacto -->
            <div
                class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105 mt-8">
                <h3 class="text-3xl font-bold text-center text-blue-700 mb-4">Envíanos un Mensaje</h3>
                <form action="enviar_contacto.php" method="POST">
                    <div class="mb-4">
                        <label for="nombre" class="block text-gray-700 font-bold">Nombre:</label>
                        <input type="text" id="nombre" name="nombre"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold">Email:</label>
                        <input type="email" id="email" name="email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="mensaje" class="block text-gray-700 font-bold">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="5"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Enviar</button>
                    </div>
                </form>
            </div>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10 mt-12">
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Columna 1: Acerca de la liga -->
            <div>
                <h3 class="text-xl font-bold mb-4">Liga de Fut 6 SSA</h3>
                <p class="text-gray-400">
                    Bienvenido a la Liga de Fut 6 SSA, donde la pasión por el fútbol se vive cada semana. ¡Forma parte
                    de la emoción, sigue a tu equipo favorito y vive la experiencia del fútbol 6!
                </p>
            </div>

            <!-- Columna 2: Enlaces rápidos -->
            <div>
                <h3 class="text-xl font-bold mb-4">Enlaces Rápidos</h3>
                <ul class="text-gray-400">
                    <li class="mb-2"><a href="privacidad.php"
                            class="hover:text-yellow-400 transition duration-300">Política de Privacidad</a></li>
                    <li class="mb-2"><a href="terminos.php"
                            class="hover:text-yellow-400 transition duration-300">Términos y Condiciones</a></li>
                    <li class="mb-2"><a href="contacto.php"
                            class="hover:text-yellow-400 transition duration-300">Contacto</a></li>
                    <li class="mb-2"><a href="inscripcion.php"
                            class="hover:text-yellow-400 transition duration-300">Inscripción</a></li>
                </ul>
            </div>

            <!-- Columna 3: Redes sociales -->
            <div>
                <h3 class="text-xl font-bold mb-4">Síguenos</h3>
                <p class="text-gray-400 mb-4">Síguenos en nuestras redes sociales para estar al día con las últimas
                    novedades:</p>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com" class="hover:text-yellow-400 transition duration-300"
                        aria-label="Facebook" target="_blank">
                        <span class="material-icons text-3xl">facebook</span>
                    </a>
                    <a href="https://www.twitter.com" class="hover:text-yellow-400 transition duration-300"
                        aria-label="Twitter" target="_blank">
                        <span class="material-icons text-3xl">twitter</span>
                    </a>
                    <a href="https://www.instagram.com" class="hover:text-yellow-400 transition duration-300"
                        aria-label="Instagram" target="_blank">
                        <span class="material-icons text-3xl">instagram</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="bg-gray-800 py-4 mt-8">
            <p class="text-center text-gray-500 text-sm">
                &copy; 2024 Liga de Fut 6 SSA. Todos los derechos reservados.
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
    // JavaScript para abrir y cerrar el menú móvil
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
    </script>
</body>

</html>