<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$productos = $conn->query("SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
</head>
<body>

<h1>Gestión de Productos</h1>

<form action="guardar_producto.php" method="POST">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Cantidad:</label><br>
    <input type="number" name="cantidad" required><br><br>

    <button type="submit">Guardar</button>

</form>

<h2>Lista de Productos</h2>

<table border="1" cellpadding="5">

    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Acciones</th>
    </tr>

    <?php while ($producto = $productos->fetch_assoc()) { ?>

    <tr>
        <td><?php echo $producto['id']; ?></td>
        <td><?php echo $producto['nombre']; ?></td>
        <td><?php echo $producto['precio']; ?></td>
        <td><?php echo $producto['cantidad']; ?></td>
        <td>
            <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a>
            |
            <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>