<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos los datos del formulario
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $fecha_creacion = $_POST["fecha_creacion"];
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $precio = $_POST["precio"];
    $proveedor_id = $_POST["proveedor_id"];

    // Realizamos la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "medisalud";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparamos la consulta SQL para insertar los datos en la tabla productos
    $sql = "INSERT INTO productos (cantidad, descripcion, fecha_creacion, id, nombre, precio, proveedor_id)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Preparamos la declaración SQL
    $stmt = $conn->prepare($sql);
    
    // Vinculamos los parámetros
    $stmt->bind_param("ississi", $cantidad, $descripcion, $fecha_creacion, $id, $nombre, $precio, $proveedor_id);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        echo "Los datos se han insertado correctamente en la base de datos.";
        include "compras.html";
    } else {
        echo "Error al insertar datos en la base de datos: " . $stmt->error;
    }

    // Cerramos la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder al script sin enviar el formulario, mostramos un mensaje de error
    echo "Acceso no autorizado.";
}
?>
