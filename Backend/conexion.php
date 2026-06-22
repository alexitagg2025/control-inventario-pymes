<?php

$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "inventario";

$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>