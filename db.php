<?php
$host = 'localhost';
$dbname = 'liga_fut6ssa';
$username = 'tu_usuario';  // Cambia a tu usuario real
$password = 'tu_contraseña';  // Cambia a la contraseña real

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>