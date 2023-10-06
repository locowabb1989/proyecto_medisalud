<?php
// Datos de conexión a la base de datos
 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medisalud";
// Nombre de la base de datos

// Obtener los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para insertar los datos en la tabla "datos"
$sql = "INSERT INTO proveedores (id, nombre, direccion, telefono, email) VALUES (?, ?, ?, ?, ?)";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bind_param("sssss", $id, $nombre, $direccion, $telefono, $email);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Los datos se han registrado correctamente en la base de datos.";
} else {
    echo "Error al registrar los datos en la base de datos: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
