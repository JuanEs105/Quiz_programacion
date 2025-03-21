<?php
require 'conexion.php';

$id = $_GET['id'];


$stmt = $conn->prepare("DELETE FROM personas WHERE id = ?");
$stmt->execute([$id]);


header("Location: index.php");
exit();
?>