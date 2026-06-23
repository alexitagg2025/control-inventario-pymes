<?php
include("conexion.php");

$producto_id = $_POST['producto_id'];
$cantidad_vendida = $_POST['cantidad'];

$consulta = $conn->query("SELECT * FROM productos WHERE id = $producto_id");
$producto = $consulta->fetch_assoc();

if ($cantidad_vendida > $producto['cantidad']) {
    die("Error: stock insuficiente.");
}

$total = $producto['precio'] * $cantidad_vendida;

$conn->query("INSERT INTO ventas (producto_id, cantidad, total)
VALUES ($producto_id, $cantidad_vendida, $total)");

$nuevo_stock = $producto['cantidad'] - $cantidad_vendida;

$conn->query("UPDATE productos
SET cantidad = $nuevo_stock
WHERE id = $producto_id");

header("Location: ventas.php");
exit();
?>