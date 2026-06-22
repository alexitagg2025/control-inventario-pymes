<?php
include("conexion.php");

$id = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE productos 
            SET nombre = '$nombre', precio = '$precio', cantidad = '$cantidad' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: productos.php");
        exit();
    } else {
        echo "Error al actualizar el producto: - editar_producto.php:19" . $conn->error;
    }
}

$resultado = $conn->query("SELECT * FROM productos WHERE id = $id");
$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>
    <h1>Editar producto</h1>

    <form method="POST">
        <label>Nombre del producto:</label><br>
        <input type="text - editar_producto.php:38" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br><br>

        <label>Precio:</label><br>
        <input type="number - editar_producto.php:41" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required><br><br>

        <label>Cantidad:</label><br>
        <input type="number - editar_producto.php:44" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required><br><br>

        <button type="submit">Actualizar producto</button>
    </form>

    <br>
    <a href="productos.php">Volver</a>
</body>
</html>