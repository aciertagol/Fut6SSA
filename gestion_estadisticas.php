<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es administrador o superusuario
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superusuario')) {
    header('Location: index.php');
    exit();
}

// Obtener las estadísticas
$sql = "SELECT estadisticas.*, equipos.nombre AS equipo_nombre FROM estadisticas JOIN equipos ON estadisticas.equipo_id = equipos.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$estadisticas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar estadísticas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipo_id = htmlspecialchars($_POST['equipo_id']);
    $victorias = htmlspecialchars($_POST['victorias']);
    $empates = htmlspecialchars($_POST['empates']);
    $derrotas = htmlspecialchars($_POST['derrotas']);
    $puntos = htmlspecialchars($_POST['puntos']);

    if (isset($_POST['id'])) {
        // Actualizar estadísticas
        $id = $_POST['id'];
        $sql = "UPDATE estadisticas SET equipo_id = :equipo_id, victorias = :victorias, empates = :empates, derrotas = :derrotas, puntos = :puntos WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':equipo_id' => $equipo_id, ':victorias' => $victorias, ':empates' => $empates, ':derrotas' => $derrotas, ':puntos' => $puntos, ':id' => $id]);
    } else {
        // Insertar nueva estadística
        $sql = "INSERT INTO estadisticas (equipo_id, victorias, empates, derrotas, puntos) VALUES (:equipo_id, :victorias, :empates, :derrotas, :puntos)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':equipo_id' => $equipo_id, ':victorias' => $victorias, ':empates' => $empates, ':derrotas' => $derrotas, ':puntos' => $puntos]);
    }

    header('Location: gestion_estadisticas.php');
    exit();
}

// Si se solicita eliminar una estadística
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM estadisticas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_estadisticas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Estadísticas</title>
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
    <h1>Gestión de Estadísticas</h1>

    <table>
        <thead>
            <tr>
                <th>Equipo</th>
                <th>Victorias</th>
                <th>Empates</th>
                <th>Derrotas</th>
                <th>Puntos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estadisticas as $estadistica): ?>
            <tr>
                <td><?php echo $estadistica['equipo_nombre']; ?></td>
                <td><?php echo $estadistica['victorias']; ?></td>
                <td><?php echo $estadistica['empates']; ?></td>
                <td><?php echo $estadistica['derrotas']; ?></td>
                <td><?php echo $estadistica['puntos']; ?></td>
                <td>
                    <a href="gestion_estadisticas.php?edit=<?php echo $estadistica['id']; ?>">Editar</a> |
                    <a href="gestion_estadisticas.php?delete=<?php echo $estadistica['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta estadística?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Estadísticas</h2>
    <form action="gestion_estadisticas.php" method="POST">
        <label for="equipo_id">Equipo:</label>
        <select id="equipo_id" name="equipo_id">
            <?php
            $sql = "SELECT * FROM equipos";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $equipos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($equipos as $equipo):
            ?>
            <option value="<?php echo $equipo['id']; ?>"><?php echo $equipo['nombre']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="victorias">Victorias:</label>
        <input type="number" id="victorias" name="victorias" required><br>

        <label for="empates">Empates:</label>
        <input type="number" id="empates" name="empates" required><br>

        <label for="derrotas">Derrotas:</label>
        <input type="number" id="derrotas" name="derrotas" required><br>

        <label for="puntos">Puntos:</label>
        <input type="number" id="puntos" name="puntos" required><br>

        <button type="submit" class="btn">Guardar Estadísticas</button>
    </form>
</body>

</html>