<?php
session_start();
session_regenerate_id(true);

// Incluir el archivo de conexión a la base de datos
include 'db.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Liga de Fut 6 SSA - Disfruta de los mejores torneos de Futbol 6. Información sobre equipos, jornadas, estadísticas e inscripciones.">
    <meta name="keywords" content="Futbol 6, Liga, Equipos, Estadísticas, Inscripciones, Jornadas">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Liga de Fut 6 SSA - Inicio">
    <meta property="og:description" content="Participa y sigue la Liga de Fut 6. Equipos, jornadas y más.">
    <meta property="og:image" content="images/futbol_banner1.jpg">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://tuliga.com/">

    <title>Liga de Fut 6 SSA - Inicio</title>

    <!-- Preload para CSS y fuentes -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="style">
    <link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="style">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com" defer></script>

    <!-- AOS para animaciones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- Swiper.js para carruseles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal overflow-x-hidden">
    <!-- Fondo animado de balones de fútbol -->
    <div class="fondo-animado">
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
    </div>

    <!-- Header con logotipo y navegación -->
    <header class="bg-gradient-to-r from-blue-700 via-blue-600 to-blue-500 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto p-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="images/logotipo.png" alt="Logotipo Liga Fut6"
                    class="h-12 mr-3 transition-transform duration-500 hover:scale-110" loading="lazy">
                <h1 class="text-3xl font-bold hover:text-yellow-300 transition duration-300">Liga de Fut 6 SSA</h1>
            </div>

            <nav class="hidden md:flex space-x-6" aria-label="Menú de navegación">
                <a href="index.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Inicio">Inicio</a>
                <a href="equipos.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Equipos">Equipos</a>
                <a href="jornadas.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Jornadas">Jornadas</a>
                <a href="estadisticas.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Estadísticas">Estadísticas</a>
                <a href="informacion.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Información">Información</a>
                <a href="inscripcion.php" class="nav-link hover:text-yellow-300 transition duration-300"
                    aria-label="Ir a Inscripción">Inscripción</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="hover:text-yellow-300 transition duration-300"
                    aria-label="Cerrar sesión">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="hover:text-yellow-300 transition duration-300"
                    aria-label="Iniciar sesión">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>

            <button id="menuToggle" class="md:hidden text-4xl focus:outline-none" aria-label="Abrir menú de navegación">
                <span class="material-icons" aria-hidden="true">menu</span>
            </button>
        </div>

        <div id="mobileMenu" class="bg-blue-700 text-white p-4 md:hidden fixed inset-0 top-16 hidden z-40">
            <nav class="flex flex-col space-y-4" aria-label="Menú móvil">
                <a href="index.php" class="nav-link hover:text-yellow-300 transition duration-300">Inicio</a>
                <a href="equipos.php" class="nav-link block py-2 hover:text-yellow-300">Equipos</a>
                <a href="jornadas.php" class="nav-link block py-2 hover:text-yellow-300">Jornadas</a>
                <a href="estadisticas.php" class="nav-link block py-2 hover:text-yellow-300">Estadísticas</a>
                <a href="informacion.php" class="nav-link block py-2 hover:text-yellow-300">Información</a>
                <a href="inscripcion.php" class="nav-link block py-2 hover:text-yellow-300">Inscripción</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="block py-2 hover:text-yellow-300">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="block py-2 hover:text-yellow-300">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Hero con carrusel de banners -->
    <main>
        <section id="inicio" class="relative bg-cover bg-center">
            <div class="swiper-container banner-swiper">
                <div class="swiper-wrapper">
                    <!-- Banners personalizados -->
                    <div class="swiper-slide">
                        <div class="relative h-full bg-cover bg-center"
                            style="background-image: url('images/futbol_banner1.jpg');" loading="lazy">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 flex flex-col justify-center items-center text-center text-white">
                                <h2 class="text-5xl font-bold mb-4" data-aos="fade-up">¡La Gran Final de la Liga!</h2>
                                <p class="text-lg mb-8" data-aos="fade-up" data-aos-delay="500">Revive los mejores
                                    momentos del torneo.</p>
                                <a href="informacion.php" class="btn-primary hover:scale-110 transition"
                                    aria-label="Descubre más">Descubre más</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="relative h-full bg-cover bg-center"
                            style="background-image: url('images/futbol_banner2.jpg');" loading="lazy">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 flex flex-col justify-center items-center text-center text-white">
                                <h2 class="text-5xl font-bold mb-4" data-aos="fade-up">¡Inscripciones Abiertas!</h2>
                                <p class="text-lg mb-8" data-aos="fade-up" data-aos-delay="500">Forma tu equipo y únete
                                    a la emoción del fútbol 6.</p>
                                <a href="inscripcion.php" class="btn-primary hover:scale-110 transition"
                                    aria-label="Inscríbete ahora">Inscríbete Ahora</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>

        <!-- Sección de equipos (desde la base de datos) -->
        <section class="container mx-auto mt-12 px-4">
            <h2 class="text-4xl font-bold mb-6 text-center" data-aos="fade-up">Nuestros Equipos</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="zoom-in">
                <?php
                // Consulta para obtener equipos desde la base de datos
                $sql = "SELECT nombre, descripcion, imagen_url FROM equipos";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($equipos as $equipo): ?>
                <div class="bg-white p-4 shadow-md hover:shadow-xl transform transition-transform hover:scale-105">
                    <img src="<?php echo $equipo['imagen_url']; ?>" alt="<?php echo $equipo['nombre']; ?>"
                        class="w-full h-56 object-cover mb-4">
                    <h3 class="text-xl font-bold text-center"><?php echo $equipo['nombre']; ?></h3>
                    <p class="text-gray-600 text-center"><?php echo $equipo['descripcion']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Sección de patrocinadores -->
        <section class="container mx-auto mt-12 px-4">
            <h2 class="text-4xl font-bold mb-6 text-center" data-aos="fade-up">Conoce a Nuestros Patrocinadores</h2>
            <p class="text-lg text-center text-gray-600 mb-8" data-aos="fade-up" data-aos-delay="200">
                Gracias a nuestros patrocinadores por hacer posible la emoción del fútbol 6. ¡Visítalos y descubre más!
            </p>
            <div class="swiper-container patrocinadores-swiper">
                <div class="swiper-wrapper">
                    <!-- Logos de patrocinadores -->
                    <div
                        class="swiper-slide flex items-center justify-center bg-white p-6 rounded-lg shadow-lg transition-transform hover:scale-105 hover:shadow-xl">
                        <a href="https://www.patrocinador1.com" target="_blank" rel="noopener noreferrer">
                            <img src="images/patrocinador1.png" alt="Patrocinador 1"
                                class="patrocinador-logo hover:opacity-90 transition-opacity">
                        </a>
                    </div>
                    <div
                        class="swiper-slide flex items-center justify-center bg-white p-6 rounded-lg shadow-lg transition-transform hover:scale-105 hover:shadow-xl">
                        <a href="https://www.patrocinador2.com" target="_blank" rel="noopener noreferrer">
                            <img src="images/patrocinador2.png" alt="Patrocinador 2"
                                class="patrocinador-logo hover:opacity-90 transition-opacity">
                        </a>
                    </div>
                    <div
                        class="swiper-slide flex items-center justify-center bg-white p-6 rounded-lg shadow-lg transition-transform hover:scale-105 hover:shadow-xl">
                        <a href="https://www.patrocinador3.com" target="_blank" rel="noopener noreferrer">
                            <img src="images/patrocinador3.png" alt="Patrocinador 3"
                                class="patrocinador-logo hover:opacity-90 transition-opacity">
                        </a>
                    </div>
                </div>
                <!-- Navegación del carrusel -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
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

    <a href="#inicio"
        class="fixed bottom-5 right-5 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full shadow-lg hover:bg-yellow-500 transition"
        aria-label="Volver al inicio">
        <span class="material-icons text-3xl">Inicio</span>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" defer></script>
    <script src="scripts.js" defer></script>
</body>

</html>