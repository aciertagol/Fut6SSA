<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es administrador o superusuario
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superusuario')) {
    header('Location: index.php');
    exit();
}

// Obtener los equipos
$sql = "SELECT * FROM equipos";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar equipos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $imagen_url = htmlspecialchars($_POST['imagen_url']);

    if (isset($_POST['id'])) {
        // Actualizar equipo
        $id = $_POST['id'];
        $sql = "UPDATE equipos SET nombre = :nombre, descripcion = :descripcion, imagen_url = :imagen_url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':descripcion' => $descripcion, ':imagen_url' => $imagen_url, ':id' => $id]);
    } else {
        // Insertar nuevo equipo
        $sql = "INSERT INTO equipos (nombre, descripcion, imagen_url) VALUES (:nombre, :descripcion, :imagen_url)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nombre' => $nombre, ':descripcion' => $descripcion, ':imagen_url' => $imagen_url]);
    }

    header('Location: gestion_equipos.php');
    exit();
}

// Si se solicita eliminar un equipo
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM equipos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_equipos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Equipos</title>
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
    <h1>Gestión de Equipos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipos as $equipo): ?>
            <tr>
                <td><?php echo $equipo['nombre']; ?></td>
                <td><?php echo $equipo['descripcion']; ?></td>
                <td><img src="<?php echo $equipo['imagen_url']; ?>" alt="<?php echo $equipo['nombre']; ?>"
                        style="width: 100px;"></td>
                <td>
                    <a href="gestion_equipos.php?edit=<?php echo $equipo['id']; ?>">Editar</a> |
                    <a href="gestion_equipos.php?delete=<?php echo $equipo['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este equipo?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Equipo</h2>
    <form action="gestion_equipos.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>

        <label for="imagen_url">URL de la Imagen:</label>
        <input type="url" id="imagen_url" name="imagen_url" required><br>

        <button type="submit" class="btn">Guardar Equipo</button>
    </form>
</body>

</html>