<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Correo al que deseas enviar las consultas
    $para = "tucorreo@example.com"; // Reemplaza este correo por el tuyo
    $asunto = "Nuevo Mensaje de Contacto - Liga Fut 6";
    $contenido = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";

    // Encabezados del correo
    $headers = "From: contacto@ligafut6ssa.com\r\n"; // Puedes ajustar esta dirección si es necesario
    $headers .= "Reply-To: $email\r\n";

    // Intentar enviar el correo
    if (mail($para, $asunto, $contenido, $headers)) {
        // Si se envía con éxito, redirecciona a la página de información con un mensaje de éxito
        echo "<script>alert('Mensaje enviado con éxito.'); window.location.href = 'informacion.php';</script>";
    } else {
        // Si hay un error, mostrar un mensaje
        echo "<script>alert('Error al enviar el mensaje. Por favor, intenta de nuevo.'); window.location.href = 'informacion.php';</script>";
    }
} else {
    // Si el formulario no se envía correctamente, redirige a la página de información
    header("Location: informacion.php");
    exit();
}