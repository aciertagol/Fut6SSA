<?php
session_start();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Formulario de inscripción para la Liga de Fut 6 SSA. Inscribe a tu equipo y participa en el torneo.">
    <meta name="keywords" content="Futbol 6, Liga, Inscripción, Equipos, Formulario">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Liga de Fut 6 SSA - Inscripción">
    <meta property="og:description"
        content="Completa el formulario de inscripción para que tu equipo participe en la Liga de Fut 6 SSA.">
    <meta property="og:image" content="images/inscripcion_banner.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tuliga.com/inscripcion.php">

    <title>Inscripción - Liga de Fut 6 SSA</title>

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

    <!-- Sección de Inscripción -->
    <main class="container mx-auto mt-12 px-4">
        <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Formulario de Inscripción</h2>
        <p class="text-lg text-center text-gray-600 mb-8">
            Completa el siguiente formulario para inscribir a tu equipo en la Liga de Fut 6 SSA.
        </p>

        <!-- Formulario de Inscripción -->
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <form action="procesar_inscripcion.php" method="POST">
                <!-- Nombre del Equipo -->
                <div class="mb-6">
                    <label for="nombre_equipo" class="block text-gray-700 font-bold mb-2">Nombre del Equipo:</label>
                    <input type="text" id="nombre_equipo" name="nombre_equipo"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Nombre del Capitán -->
                <div class="mb-6">
                    <label for="nombre_capitan" class="block text-gray-700 font-bold mb-2">Nombre del Capitán:</label>
                    <input type="text" id="nombre_capitan" name="nombre_capitan"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico:</label>
                    <input type="email" id="email" name="email"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Teléfono -->
                <div class="mb-6">
                    <label for="telefono" class="block text-gray-700 font-bold mb-2">Teléfono de Contacto:</label>
                    <input type="tel" id="telefono" name="telefono"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>

                <!-- Jugadores -->
                <div class="mb-6">
                    <label for="jugadores" class="block text-gray-700 font-bold mb-2">Nombres de los Jugadores (máx.
                        12):</label>
                    <textarea id="jugadores" name="jugadores" rows="4"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Introduce los nombres separados por comas" required></textarea>
                </div>

                <!-- Botón de Enviar -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">Inscribir
                        Equipo</button>
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