<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$productos = $conn->query("SELECT * FROM productos WHERE cantidad > 0");
$ventas = $conn->query("SELECT ventas.id, productos.nombre, ventas.cantidad, ventas.total, ventas.fecha 
                        FROM ventas 
                        INNER JOIN productos ON ventas.producto_id = productos.id 
                        ORDER BY ventas.fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Ventas</title>
</head>
<body>

<h1>Registro de ventas</h1>

<form action="guardar_venta.php" method="POST">

    <label>Producto:</label><br>
    <select name="producto_id" required>
        <option value="">Seleccione un producto</option>
        <?php while ($producto = $productos->fetch_assoc()) { ?>
            <option value="<?php echo $producto['id']; ?>">
                <?php echo $producto['nombre']; ?> - Stock: <?php echo $producto['cantidad']; ?> - Precio: $<?php echo $producto['precio']; ?>
            </option>
        <?php } ?>
    </select>
    <br><br>

    <label>Cantidad:</label><br>
    <input type="number" name="cantidad" min="1" required>
    <br><br>

    <button type="submit">Registrar venta</button>

</form>

<br>

<a href="productos.php">Volver a productos</a>

<h2>Historial de ventas</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Fecha</th>
    </tr>

    <?php while ($venta = $ventas->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $venta['id']; ?></td>
            <td><?php echo $venta['nombre']; ?></td>
            <td><?php echo $venta['cantidad']; ?></td>
            <td>$<?php echo $venta['total']; ?></td>
            <td><?php echo $venta['fecha']; ?></td>
        </tr>
    <?php } ?>

</table>

</body>
</html>