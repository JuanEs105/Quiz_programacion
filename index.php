<?php
require 'conexion.php';

$stmt = $conn->query("SELECT * FROM personas");
$personas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Personas</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Lista de Personas</h1>
    <a href="crear.php">Crear Nueva Persona</a>

    <table>
        <thead>
            <tr>
                <th class="hidden-id">ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Es Mayor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personas as $persona): ?>
            <tr>
                <td class="hidden-id"><?= $persona['id'] ?></td>
                <td><?= $persona['nombre'] ?></td>
                <td><?= $persona['email'] ?></td>
                <td><?= $persona['edad'] ?></td>
                <td><?= ($persona['edad'] >= 18) ? 'Sí' : 'No' ?></td>
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