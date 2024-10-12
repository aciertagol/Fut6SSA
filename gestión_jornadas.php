<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Verificar si el usuario es administrador o superusuario
if (!isset($_SESSION['user_id']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superusuario')) {
    header('Location: index.php');
    exit();
}

// Obtener las jornadas
$sql = "SELECT * FROM jornadas";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$jornadas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Si se envía el formulario para agregar o editar jornadas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipo_local = htmlspecialchars($_POST['equipo_local']);
    $equipo_visitante = htmlspecialchars($_POST['equipo_visitante']);
    $fecha = htmlspecialchars($_POST['fecha']);
    $resultado = htmlspecialchars($_POST['resultado']);

    if (isset($_POST['id'])) {
        // Actualizar jornada
        $id = $_POST['id'];
        $sql = "UPDATE jornadas SET equipo_local = :equipo_local, equipo_visitante = :equipo_visitante, fecha = :fecha, resultado = :resultado WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':equipo_local' => $equipo_local, ':equipo_visitante' => $equipo_visitante, ':fecha' => $fecha, ':resultado' => $resultado, ':id' => $id]);
    } else {
        // Insertar nueva jornada
        $sql = "INSERT INTO jornadas (equipo_local, equipo_visitante, fecha, resultado) VALUES (:equipo_local, :equipo_visitante, :fecha, :resultado)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':equipo_local' => $equipo_local, ':equipo_visitante' => $equipo_visitante, ':fecha' => $fecha, ':resultado' => $resultado]);
    }

    header('Location: gestion_jornadas.php');
    exit();
}

// Si se solicita eliminar una jornada
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM jornadas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);
    
    header('Location: gestion_jornadas.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Jornadas</title>
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
    <h1>Gestión de Jornadas</h1>

    <table>
        <thead>
            <tr>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Fecha</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jornadas as $jornada): ?>
            <tr>
                <td><?php echo $jornada['equipo_local']; ?></td>
                <td><?php echo $jornada['equipo_visitante']; ?></td>
                <td><?php echo $jornada['fecha']; ?></td>
                <td><?php echo $jornada['resultado']; ?></td>
                <td>
                    <a href="gestion_jornadas.php?edit=<?php echo $jornada['id']; ?>">Editar</a> |
                    <a href="gestion_jornadas.php?delete=<?php echo $jornada['id']; ?>"
                        onclick="return confirm('¿Seguro que deseas eliminar esta jornada?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Agregar/Editar Jornada</h2>
    <form action="gestion_jornadas.php" method="POST">
        <label for="equipo_local">Equipo Local:</label>
        <input type="text" id="equipo_local" name="equipo_local" required><br>

        <label for="equipo_visitante">Equipo Visitante:</label>
        <input type="text" id="equipo_visitante" name="equipo_visitante" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="resultado">Resultado:</label>
        <input type="text" id="resultado" name="resultado" required><br>

        <button type="submit" class="btn">Guardar Jornada</button>
    </form>
</body>

</html>