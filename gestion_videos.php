<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es administrador o superusuario
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superusuario')) {
    header('Location: index.php');
    exit();
}

// Obtener los videos de la base de datos
$sql = "SELECT * FROM videos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$videos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar videos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = htmlspecialchars($_POST['titulo']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $url_video = htmlspecialchars($_POST['url_video']);

    if (isset($_POST['id'])) {
        // Actualizar video
        $id = $_POST['id'];
        $sql = "UPDATE videos SET titulo = :titulo, descripcion = :descripcion, url_video = :url_video WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $titulo, ':descripcion' => $descripcion, ':url_video' => $url_video, ':id' => $id]);
    } else {
        // Insertar nuevo video
        $sql = "INSERT INTO videos (titulo, descripcion, url_video) VALUES (:titulo, :descripcion, :url_video)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':titulo' => $titulo, ':descripcion' => $descripcion, ':url_video' => $url_video]);
    }

    header('Location: gestion_videos.php');
    exit();
}

// Si se solicita eliminar un video
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM videos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_videos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Videos</title>
    <style>
    .btn {
        padding: 10px;
        background-color: #007bff;
        color: white;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    table {
        width: 100%;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
    }
    </style>
</head>

<body>
    <h1>Gestión de Videos</h1>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>URL del Video</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video): ?>
            <tr>
                <td><?php echo $video['titulo']; ?></td>
                <td><?php echo $video['descripcion']; ?></td>
                <td><a href="<?php echo $video['url_video']; ?>" target="_blank"><?php echo $video['url_video']; ?></a>
                </td>
                <td>
                    <a href="gestion_videos.php?edit=<?php echo $video['id']; ?>">Editar</a> |
                    <a href="gestion_videos.php?delete=<?php echo $video['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este video?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Video</h2>
    <form action="gestion_videos.php" method="POST">
        <label for="titulo">Título del Video:</label>
        <input type="text" id="titulo" name="titulo" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="url_video">URL del Video (YouTube, Vimeo, etc.):</label>
        <input type="url" id="url_video" name="url_video" required><br>

        <button type="submit" class="btn">Guardar Video</button>
    </form>
</body>

</html>