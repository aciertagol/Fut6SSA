<?php
session_start();
include 'db.php'; // Conexión a la base de datos

// Variable para almacenar el mensaje de error
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Verificar si el usuario existe en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar si la contraseña ingresada coincide con la almacenada (hash)
        if (password_verify($password, $usuario['password'])) {
            // La contraseña es correcta, iniciar sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nombre'];
            $_SESSION['user_email'] = $usuario['email'];

            // Redirigir al inicio o a la página del usuario
            header("Location: index.php");
            exit();
        } else {
            // Contraseña incorrecta
            $error_message = "Contraseña incorrecta. Por favor, inténtalo de nuevo.";
        }
    } else {
        // El usuario no existe
        $error_message = "No se encontró un usuario con ese correo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión en la Liga de Fut 6 SSA.">
    <meta name="robots" content="noindex, nofollow">
    <title>Iniciar Sesión - Liga de Fut 6 SSA</title>

    <style>
    /* Fondo degradado animado */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        background: linear-gradient(135deg, #4fd1c5, #3182ce);
        background-size: 400% 400%;
        animation: gradientBackground 15s ease infinite;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @keyframes gradientBackground {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Fondo de balones en movimiento */
    .background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: -1;
    }

    .balon {
        position: absolute;
        width: 50px;
        height: 50px;
        background-image: url('https://example.com/balon.png');
        /* Cambia a la URL de tu balón */
        background-size: cover;
        animation: moverBalon 10s linear infinite;
        opacity: 0.5;
    }

    @keyframes moverBalon {
        0% {
            transform: translateY(-100px) rotate(0deg);
        }

        100% {
            transform: translateY(100vh) rotate(360deg);
        }
    }

    .balon:nth-child(1) {
        left: 10%;
        animation-duration: 12s;
    }

    .balon:nth-child(2) {
        left: 30%;
        animation-duration: 15s;
        animation-delay: 3s;
    }

    .balon:nth-child(3) {
        left: 50%;
        animation-duration: 18s;
    }

    .balon:nth-child(4) {
        left: 70%;
        animation-duration: 10s;
        animation-delay: 1s;
    }

    .balon:nth-child(5) {
        left: 90%;
        animation-duration: 13s;
        animation-delay: 2s;
    }

    /* Logotipo animado */
    .logo-container {
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }

    .logo {
        width: 120px;
        height: auto;
        animation: logoBounce 2s infinite;
    }

    @keyframes logoBounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Estilo del formulario */
    .container {
        max-width: 400px;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        z-index: 1;
        backdrop-filter: blur(10px);
        position: relative;
    }

    /* Efecto hover */
    .container:hover {
        transform: translateY(-5px);
        transition: transform 0.3s ease;
    }

    /* Estilo de encabezado */
    h2 {
        text-align: center;
        color: #2d3748;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* Estilo para los campos de entrada */
    .input-field {
        width: 100%;
        padding: 14px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .input-field:focus {
        border-color: #3182ce;
        outline: none;
        box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
    }

    /* Botón de envío */
    .btn-submit {
        background-color: #3182ce;
        color: white;
        padding: 14px;
        border-radius: 8px;
        width: 100%;
        text-align: center;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #2b6cb0;
        transform: translateY(-3px);
    }

    /* Estilo para el mensaje de error */
    .error-message {
        color: #e53e3e;
        background-color: #fff5f5;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
        border: 1px solid #feb2b2;
    }

    /* Campo de contraseña */
    .password-field {
        position: relative;
    }

    .toggle-password {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 18px;
        color: #718096;
    }
    </style>
</head>

<body>
    <!-- Fondo con balones en movimiento -->
    <div class="background">
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
        <div class="balon"></div>
    </div>

    <!-- Contenedor del formulario -->
    <div class="container">
        <div class="logo-container">
            <img src="https://example.com/logotipo.png" alt="Logotipo" class="logo"> <!-- Cambia a tu logotipo -->
        </div>

        <h2>Iniciar Sesión</h2>

        <?php if ($error_message): ?>
        <div class="error-message fade-in">
            <strong>Error:</strong> <?php echo $error_message; ?>
        </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="input-group">
                <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="input-field" required>
            </div>

            <div class="input-group password-field">
                <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña:</label>
                <input type="password" id="password" name="password" class="input-field" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>

            <div class="input-group">
                <div class="btn-submit" onclick="this.closest('form').submit();">Iniciar Sesión</div>
            </div>
        </form>
    </div>

    <script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.querySelector(".toggle-password");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.textContent = "🙈"; // Cambiar el ícono
        } else {
            passwordField.type = "password";
            toggleIcon.textContent = "👁️"; // Cambiar el ícono
        }
    }
    </script>
</body>

</html>