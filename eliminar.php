<?php
require 'conexion.php';

$id = $_GET['id'];

// Eliminar la persona
$stmt = $conn->prepare("DELETE FROM personas WHERE id = ?");
$stmt->execute([$id]);

// Redirigir a index.php
header("Location: index.php");
exit();
?>