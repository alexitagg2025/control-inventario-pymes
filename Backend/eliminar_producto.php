<?php
include("conexion.php");

$id = intval($_GET['id']);

$sql = "DELETE FROM productos WHERE id = $id";

if ($conn->query($sql)) {
    header("Location: productos.php");
    exit();
} else {
    echo "Error: - eliminar_producto.php:12" . $conn->error;
}
?>