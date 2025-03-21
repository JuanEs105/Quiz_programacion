<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];


    $stmt = $conn->prepare("INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $email, $edad]);

 
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Persona</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Crear Persona</h1>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="edad" placeholder="Edad" required><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>