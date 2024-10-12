<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario está autenticado y si es admin o superusuario
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superusuario')) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Liga de Fut 6 SSA</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .section {
        margin-bottom: 30px;
    }

    h2 {
        color: #007bff;
    }

    .btn {
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
        display: inline-block;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .btn-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Panel de Control</h1>

        <!-- Sección de Gestión de Equipos, Jornadas, Estadísticas y Videos -->
        <?php if ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'superusuario'): ?>
        <div class="section">
            <h2>Gestión de Equipos</h2>
            <div class="btn-group">
                <a href="gestion_equipos.php" class="btn">Gestionar Equipos</a>
            </div>
        </div>

        <div class="section">
            <h2>Gestión de Jornadas</h2>
            <div class="btn-group">
                <a href="gestion_jornadas.php" class="btn">Gestionar Jornadas</a>
            </div>
        </div>

        <div class="section">
            <h2>Gestión de Estadísticas</h2>
            <div class="btn-group">
                <a href="gestion_estadisticas.php" class="btn">Gestionar Estadísticas</a>
            </div>
        </div>

        <div class="section">
            <h2>Gestión de Videos</h2>
            <div class="btn-group">
                <a href="gestion_videos.php" class="btn">Gestionar Videos</a>
            </div>
        </div>
        <?php endif; ?>

        <!-- Opciones adicionales solo para Super Usuario -->
        <?php if ($_SESSION['user_role'] == 'superusuario'): ?>
        <div class="section">
            <h2>Gestión del Carrusel de Imágenes</h2>
            <div class="btn-group">
                <a href="gestion_carrusel.php" class="btn">Gestionar Carrusel</a>
            </div>
        </div>

        <div class="section">
            <h2>Gestión de Patrocinadores</h2>
            <div class="btn-group">
                <a href="gestion_patrocinadores.php" class="btn">Gestionar Patrocinadores</a>
            </div>
        </div>
        <?php endif; ?>

    </div>

</body>

</html>