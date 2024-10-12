<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es superusuario
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'superusuario') {
    header('Location: index.php');
    exit();
}

// Obtener los patrocinadores
$sql = "SELECT * FROM patrocinadores";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$patrocinadores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar patrocinadores
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $imagen_url = htmlspecialchars($_POST['imagen_url']);
    $enlace = htmlspecialchars($_POST['enlace']);

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE patrocinadores SET nombre = :nombre, imagen_url = :imagen_url, enlace = :enlace WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':imagen_url' => $imagen_url, ':enlace' => $enlace, ':id' => $id]);
    } else {
        $sql = "INSERT INTO patrocinadores (nombre, imagen_url, enlace) VALUES (:nombre, :imagen_url, :enlace)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':imagen_url' => $imagen_url, ':enlace' => $enlace]);
    }

    header('Location: gestion_patrocinadores.php');
    exit();
}

// Si se solicita eliminar un patrocinador
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM patrocinadores WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_patrocinadores.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Patrocinadores</title>
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
    <h1>Gestión de Patrocinadores</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Enlace</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patrocinadores as $patrocinador): ?>
            <tr>
                <td><?php echo $patrocinador['nombre']; ?></td>
                <td><img src="<?php echo $patrocinador['imagen_url']; ?>" alt="<?php echo $patrocinador['nombre']; ?>"
                        style="width: 100px;"></td>
                <td><a href="<?php echo $patrocinador['enlace']; ?>"
                        target="_blank"><?php echo $patrocinador['enlace']; ?></a></td>
                <td>
                    <a href="gestion_patrocinadores.php?edit=<?php echo $patrocinador['id']; ?>">Editar</a> |
                    <a href="gestion_patrocinadores.php?delete=<?php echo $patrocinador['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este patrocinador?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Patrocinador</h2>
    <form action="gestion_patrocinadores.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="imagen_url">URL de la Imagen:</label>
        <input type="url" id="imagen_url" name="imagen_url" required><br>

        <label for="enlace">Enlace:</label>
        <input type="url" id="enlace" name="enlace" required><br>

        <button type="submit" class="btn">Guardar Patrocinador</button>
    </form>
</body>

</html>