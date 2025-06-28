<?php
$conexion = new mysqli("localhost", "CLIENTE", "CONTRASEÑA", "NOMBRE");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$datos = json_decode(file_get_contents("php://input"), true);

foreach ($datos as $item) {
    $producto = $conexion->real_escape_string($item["nombre"]);
    $precio = floatval($item["precio"]);
    $cantidad = 1;

    $sql = "INSERT INTO pedidos (producto, precio, cantidad) VALUES ('$producto', $precio, $cantidad)";
    $conexion->query($sql);
}

echo "Pedido recibido";
?>




