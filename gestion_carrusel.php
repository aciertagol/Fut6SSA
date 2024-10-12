<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es superusuario
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'superusuario') {
    header('Location: index.php');
    exit();
}

// Obtener las imágenes del carrusel
$sql = "SELECT * FROM carrusel";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar imágenes del carrusel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imagen_url = htmlspecialchars($_POST['imagen_url']);
    $descripcion = htmlspecialchars($_POST['descripcion']);

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE carrusel SET imagen_url = :imagen_url, descripcion = :descripcion WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':imagen_url' => $imagen_url, ':descripcion' => $descripcion, ':id' => $id]);
    } else {
        $sql = "INSERT INTO carrusel (imagen_url, descripcion) VALUES (:imagen_url, :descripcion)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':imagen_url' => $imagen_url, ':descripcion' => $descripcion]);
    }

    header('Location: gestion_carrusel.php');
    exit();
}

// Si se solicita eliminar una imagen del carrusel
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM carrusel WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_carrusel.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del Carrusel</title>
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
    <h1>Gestión del Carrusel</h1>

    <table>
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagenes as $imagen): ?>
            <tr>
                <td><img src="<?php echo $imagen['imagen_url']; ?>" alt="<?php echo $imagen['descripcion']; ?>"
                        style="width: 100px;"></td>
                <td><?php echo $imagen['descripcion']; ?></td>
                <td>
                    <a href="gestion_carrusel.php?edit=<?php echo $imagen['id']; ?>">Editar</a> |
                    <a href="gestion_carrusel.php?delete=<?php echo $imagen['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta imagen?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Imagen del Carrusel</h2>
    <form action="gestion_carrusel.php" method="POST">
        <label for="imagen_url">URL de la Imagen:</label>
        <input type="url" id="imagen_url" name="imagen_url" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <button type="submit" class="btn">Guardar Imagen</button>
    </form>
</body>

</html>
``