<?php
require 'conexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    // Actualizar los datos de la persona
    $stmt = $conn->prepare("UPDATE personas SET nombre = ?, email = ?, edad = ? WHERE id = ?");
    $stmt->execute([$nombre, $email, $edad, $id]);

    // Redirigir a index.php
    header("Location: index.php");
    exit();
}

// Obtener los datos de la persona para mostrar en el formulario
$sql = "SELECT * FROM personas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Editar Persona</h1>
    <form method="post">
        <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br>
        <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        <input type="number" name="edad" value="<?= $row['edad'] ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
    <a href="index.php">Volver</a>
</body>
</html>