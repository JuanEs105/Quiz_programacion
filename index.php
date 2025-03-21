<?php
require 'conexion.php';

// Leer datos de la tabla personas
$sql = "SELECT * FROM personas";
$result = $conn->query($sql);
$personas = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Personas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Personas</h1>
    <a href="crear.php">Crear Nueva Persona</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Es Mayor de Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= $persona['id'] ?></td>
                <td><?= $persona['nombre'] ?></td>
                <td><?= $persona['email'] ?></td>
                <td><?= $persona['edad'] ?></td>
                <td><?= ($persona['edad'] >= 18) ? "Sí" : "No" ?></td>
                <td>
                    <a href="editar.php?id=<?= $persona['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $persona['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>