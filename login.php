<?php
// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


// Realizar la conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medisalud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Consulta SQL para verificar las credenciales
//$sql = "SELECT * FROM login WHERE usuario='$usuario' AND pasword='$contrasena'";
//$result = $conn->query($sql);
$sql = "SELECT * FROM login WHERE usuario = ? AND pasword = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contrasena);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    echo "Inicio de sesión exitoso";
    // Redirecciona a la página de productos u otra página
    //header("Location: productos.html");
   include "productos.html";
} else {
    // Inicio de sesión fallido
    echo "Inicio de sesión fallido";
}

$conn->close();
?>
