<?php
require 'conexion.php';

// Crear
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $stmt = $pdo->prepare('INSERT INTO personas (nombre, email, edad) VALUES (?, ?, ?)');
    $stmt->execute([$nombre, $email, $edad]);
}

// Leer
$stmt = $pdo->query('SELECT * FROM personas');
$personas = $stmt->fetchAll();

// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];
    $stmt = $pdo->prepare('UPDATE personas SET nombre = ?, email = ?, edad = ? WHERE id = ?');
    $stmt->execute([$nombre, $email, $edad, $id]);
}

// Eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['eliminar'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare('DELETE FROM personas WHERE id = ?');
    $stmt->execute([$id]);
}
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
    <h1>CRUD Personas</h1>

    <!-- Formulario para Crear y Actualizar -->
    <form method="POST">
        <input type="hidden" name="id" id="id">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="number" name="edad" id="edad" placeholder="Edad" required>
        <button type="submit" name="crear">Crear</button>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>

    <!-- Lista de Personas -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
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
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $persona['id'] ?>">
                        <button type="submit" name="eliminar">Eliminar</button>
                    </form>
                    <button onclick="editarPersona(<?= $persona['id'] ?>, '<?= $persona['nombre'] ?>', '<?= $persona['email'] ?>', <?= $persona['edad'] ?>)">Editar</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        function editarPersona(id, nombre, email, edad) {
            document.getElementById('id').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('email').value = email;
            document.getElementById('edad').value = edad;
        }
    </script>
</body>
</html>