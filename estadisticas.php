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
        content="Estadísticas de la Liga de Fut 6 SSA. Tabla de posiciones, máximos goleadores y estadísticas por equipo.">
    <meta name="keywords" content="Futbol 6, Estadísticas, Liga, Tabla de posiciones, Goleadores, Equipos">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Liga de Fut 6 SSA - Estadísticas">
    <meta property="og:description"
        content="Consulta las estadísticas de la Liga de Fut 6 SSA, incluyendo la tabla de posiciones y máximos goleadores.">
    <meta property="og:image" content="images/estadisticas_banner.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tuliga.com/estadisticas.php">

    <title>Estadísticas - Liga de Fut 6 SSA</title>

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

    <!-- Sección Principal de Estadísticas -->
    <main>
        <section class="container mx-auto mt-12 px-4">
            <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Estadísticas de la Liga</h2>
            <p class="text-lg text-center text-gray-600 mb-8">
                Consulta las estadísticas más recientes de la Liga de Fut 6 SSA.
            </p>

            <!-- Tabla de posiciones -->
            <div class="mb-12">
                <h3 class="text-3xl font-bold mb-4 text-center text-blue-700">Tabla de Posiciones</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-700 text-white">
                                <th class="py-3 px-4 text-left">#</th>
                                <th class="py-3 px-4 text-left">Equipo</th>
                                <th class="py-3 px-4 text-left">PJ</th>
                                <th class="py-3 px-4 text-left">PG</th>
                                <th class="py-3 px-4 text-left">PE</th>
                                <th class="py-3 px-4 text-left">PP</th>
                                <th class="py-3 px-4 text-left">GF</th>
                                <th class="py-3 px-4 text-left">GC</th>
                                <th class="py-3 px-4 text-left">Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">Equipo A</td>
                                <td class="py-3 px-4">10</td>
                                <td class="py-3 px-4">7</td>
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">21</td>
                                <td class="py-3 px-4">12</td>
                                <td class="py-3 px-4">23</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">Equipo B</td>
                                <td class="py-3 px-4">10</td>
                                <td class="py-3 px-4">6</td>
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">18</td>
                                <td class="py-3 px-4">10</td>
                                <td class="py-3 px-4">20</td>
                            </tr>
                            <!-- Más filas de la tabla -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Máximos Goleadores -->
            <div class="mb-12">
                <h3 class="text-3xl font-bold mb-4 text-center text-blue-700">Máximos Goleadores</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr class="bg-blue-700 text-white">
                                <th class="py-3 px-4 text-left">#</th>
                                <th class="py-3 px-4 text-left">Jugador</th>
                                <th class="py-3 px-4 text-left">Equipo</th>
                                <th class="py-3 px-4 text-left">Goles</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">1</td>
                                <td class="py-3 px-4">Juan Pérez</td>
                                <td class="py-3 px-4">Equipo A</td>
                                <td class="py-3 px-4">15</td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="py-3 px-4">2</td>
                                <td class="py-3 px-4">Carlos Gómez</td>
                                <td class="py-3 px-4">Equipo B</td>
                                <td class="py-3 px-4">12</td>
                            </tr>
                            <!-- Más filas de goleadores -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Estadísticas por Equipo -->
            <div class="mb-12">
                <h3 class="text-3xl font-bold mb-4 text-center text-blue-700">Estadísticas por Equipo</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Tarjeta del equipo -->
                    <div
                        class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                        <h4 class="text-2xl font-bold mb-2 text-center">Equipo A</h4>
                        <p class="text-center text-gray-600">PJ: 10 | PG: 7 | PE: 2 | PP: 1 | GF: 21 | GC: 12 | Puntos:
                            23</p>
                    </div>

                    <div
                        class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transform transition-transform hover:scale-105">
                        <h4 class="text-2xl font-bold mb-2 text-center">Equipo B</h4>
                        <p class="text-center text-gray-600">PJ: 10 | PG: 6 | PE: 2 | PP: 2 | GF: 18 | GC: 10 | Puntos:
                            20</p>
                    </div>

                    <!-- Más tarjetas de equipos -->
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-10">
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