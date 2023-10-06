<?php
// Obtener los datos del formulario
$id = $_POST['id'];
$productoid = $_POST['productoid'];
$cantidad = $_POST['cantidad'];
$preciounitario = $_POST['preciounitario'];
$fechadecompra = $_POST['fechadecompra'];
$proveedorid = $_POST['proveedorid'];

// Realizar la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medisalud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para insertar los datos en la tabla compras
$sql = "INSERT INTO compras (id, productoid, cantidad, preciounitario, fechadecompra, proveedorid)
        VALUES (?, ?, ?, ?, ?, ?)";

// Preparamos la declaración SQL
$stmt = $conn->prepare($sql);

// Vinculamos los parámetros
$stmt->bind_param("ssidis", $id, $productoid, $cantidad, $preciounitario, $fechadecompra, $proveedorid);

// Ejecutamos la consulta
if ($stmt->execute()) {
    echo "La compra se ha registrado correctamente en la base de datos.";
    include "proveedores.html";
} else {
    echo "Error al registrar la compra en la base de datos: " . $stmt->error;
}

// Cerramos la conexión
$stmt->close();
$conn->close();
?>
