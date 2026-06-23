<?php
include("conexion.php");

$id = intval($_GET['id']);

$verificar = $conn->query("SELECT * FROM ventas WHERE producto_id = $id");

if ($verificar->num_rows > 0) {
    echo "No se puede eliminar este producto porque ya tiene ventas registradas.";
    echo "<br><br>";
    echo "<a href='productos.php'>Volver a productos</a>";
    exit();
}

$sql = "DELETE FROM productos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: productos.php");
    exit();
} else {
    echo "Error al eliminar el producto: " . $conn->error;
}
?>