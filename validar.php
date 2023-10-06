<?php
// Recibe los datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verificar las credenciales (puedes adaptar esto según tu lógica de autenticación)
if ($usuario == 'usuario_valido' && $contrasena == 'contrasena_valida') {
    // Las credenciales son válidas, redirige al usuario a la página deseada
    header("Location: productos.html");
} else {
    // Las credenciales son incorrectas, muestra un mensaje de error o redirige a otra página de error
    echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
}
?>
