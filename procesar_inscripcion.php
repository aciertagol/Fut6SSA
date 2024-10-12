<?php
// Incluir el archivo para la conexión a la base de datos
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos del formulario
    $nombre_equipo = htmlspecialchars($_POST['nombre_equipo']);
    $nombre_capitan = htmlspecialchars($_POST['nombre_capitan']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $jugadores = htmlspecialchars($_POST['jugadores']);

    // Insertar los datos en la base de datos
    try {
        $sql = "INSERT INTO equipos (nombre_equipo, nombre_capitan, email, telefono, jugadores) 
                VALUES (:nombre_equipo, :nombre_capitan, :email, :telefono, :jugadores)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre_equipo' => $nombre_equipo,
            ':nombre_capitan' => $nombre_capitan,
            ':email' => $email,
            ':telefono' => $telefono,
            ':jugadores' => $jugadores,
        ]);

        // Enviar un correo de confirmación al capitán
        $para = $email; // Correo del capitán
        $asunto = "Confirmación de Inscripción - Liga Fut 6 SSA";
        $mensaje = "Hola $nombre_capitan, \n\nGracias por inscribir a tu equipo '$nombre_equipo' en la Liga de Fut 6 SSA. \nEstos son los jugadores inscritos: \n$jugadores\n\nNos vemos en el torneo. ¡Suerte!";
        $headers = "From: contacto@ligafut6ssa.com\r\n";
        $headers .= "Reply-To: contacto@ligafut6ssa.com\r\n";

        // Enviar el correo
        mail($para, $asunto, $mensaje, $headers);

        // Redirigir a la página de confirmación
        header("Location: confirmacion.php");
        exit();

    } catch (PDOException $e) {
        // En caso de error, mostrar un mensaje y redirigir de vuelta a la inscripción
        echo "<script>alert('Error al guardar la inscripción. Inténtalo de nuevo.'); window.location.href = 'inscripcion.php';</script>";
    }
} else {
    // Si el formulario no se envió correctamente, redirigir a la página de inscripción
    header("Location: inscripcion.php");
    exit();
}