<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO productos (nombre, precio, cantidad) 
        VALUES ('$nombre', '$precio', '$cantidad')";

if ($conn->query($sql) === TRUE) {
    header("Location: productos.php");
    exit();
} else {
    echo "Error al guardar el producto: - guardar_producto.php:15" . $conn->error;
}
?>