<?php
session_start();
include 'db.php';

// Obtener el ID del equipo desde la URL
$id_equipo = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id_equipo > 0) {
    // Obtener los detalles del equipo desde la base de datos
    $sql = "SELECT * FROM equipos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id_equipo]);
    $equipo = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no existe el equipo, redirigir a la lista de equipos
    if (!$equipo) {
        header("Location: equipos.php");
        exit();
    }
} else {
    // Si no hay ID válido, redirigir a la lista de equipos
    header("Location: equipos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detalles del equipo en la Liga de Fut 6 SSA.">
    <meta name="robots" content="noindex, nofollow">
    <title>Detalles del Equipo - Liga de Fut 6 SSA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Sección de Detalles del Equipo -->
    <main class="container mx-auto mt-12 px-4">
        <h2 class="text-4xl font-bold mb-6 text-center text-blue-700">Detalles del Equipo</h2>
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h3 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($equipo['nombre_equipo']); ?></h3>
            <p class="text-gray-600 mb-2">Capitán: <?php echo htmlspecialchars($equipo['nombre_capitan']); ?></p>
            <p class="text-gray-600 mb-2">Correo Electrónico: <?php echo htmlspecialchars($equipo['email']); ?></p>
            <p class="text-gray-600 mb-2">Teléfono: <?php echo htmlspecialchars($equipo['telefono']); ?></p>
            <h4 class="text-xl font-bold mt-6">Jugadores:</h4>
            <p class="text-gray-600 mb-4"><?php echo nl2br(htmlspecialchars($equipo['jugadores'])); ?></p>
            <a href="equipos.php" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Volver a la Lista de Equipos
            </a>
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