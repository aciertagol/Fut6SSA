<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Términos y Condiciones de la Liga de Fut 6 SSA.">
    <meta name="robots" content="index, follow">
    <title>Términos y Condiciones - Liga de Fut 6 SSA</title>

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

    <!-- Sección de Términos y Condiciones -->
    <main class="container mx-auto mt-12 px-4">
        <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Términos y Condiciones</h2>
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <p class="text-lg text-gray-700 mb-4">
                Los presentes Términos y Condiciones regulan el uso del sitio web y la participación en la Liga de Fut 6
                SSA. Al inscribirse en la liga o utilizar el sitio web, aceptas cumplir con estas disposiciones.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">1. Inscripción en la liga</h3>
            <p class="text-gray-600 mb-4">
                Para inscribirse en la Liga de Fut 6 SSA, el usuario debe proporcionar información veraz y precisa, como
                el nombre del equipo, nombre del capitán y los datos de los jugadores. La inscripción está sujeta a la
                confirmación por parte de los organizadores.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">2. Participación en los partidos</h3>
            <p class="text-gray-600 mb-4">
                Los equipos inscritos deberán cumplir con las reglas establecidas por la organización de la liga. El
                incumplimiento de estas reglas puede resultar en la descalificación del equipo o la suspensión de la
                participación en el torneo.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">3. Responsabilidad del usuario</h3>
            <p class="text-gray-600 mb-4">
                Cada equipo es responsable de la conducta de sus jugadores y del cumplimiento de las normas durante los
                partidos. La Liga de Fut 6 SSA no se hace responsable de lesiones, daños o pérdidas ocurridas durante
                los partidos.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">4. Propiedad intelectual</h3>
            <p class="text-gray-600 mb-4">
                Todos los contenidos del sitio web de la Liga de Fut 6 SSA, como logotipos, textos e imágenes, están
                protegidos por derechos de autor. Está prohibida la reproducción o distribución de estos contenidos sin
                la autorización previa de los propietarios.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">5. Modificaciones</h3>
            <p class="text-gray-600 mb-4">
                La Liga de Fut 6 SSA se reserva el derecho de modificar estos Términos y Condiciones en cualquier
                momento. Las modificaciones entrarán en vigor una vez publicadas en el sitio web.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">6. Cancelación de la inscripción</h3>
            <p class="text-gray-600 mb-4">
                Los equipos pueden cancelar su inscripción antes del inicio de la liga enviando una solicitud por
                escrito a los organizadores. Las cuotas de inscripción no son reembolsables.
            </p>

            <h3 class="text-2xl font-bold mb-4 text-blue-700">7. Jurisdicción</h3>
            <p class="text-gray-600 mb-4">
                Cualquier conflicto o disputa que surja en relación con la participación en la Liga de Fut 6 SSA estará
                sujeto a la jurisdicción de los tribunales locales, de acuerdo con la legislación vigente.
            </p>

            <p class="text-gray-600 mb-4">
                Si tienes alguna duda sobre estos términos y condiciones, por favor, ponte en contacto con nosotros a
                través del correo <strong>legal@ligafut6ssa.com</strong>.
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