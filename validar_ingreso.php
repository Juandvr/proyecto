<?php
session_start();

include 'db_connection.php';

// Obtener los datos del formulario
$email = $_POST['correo'];
$password = $_POST['password'];

// Evitar inyección SQL
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM cliente WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario existe, verificar la contraseña
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['contraseña'])) {
        // Contraseña correcta, iniciar sesión
        $_SESSION['usuario_id'] = $row['ID_Cliente'];
        $_SESSION['nombre'] = $row['nombre'];
        header("Location: perfil.php"); // Redirigir a la página de perfil
    } else {
        // Contraseña incorrecta
        echo "contraseña incorrecta. <a href='ingreso.html'>Intentar de nuevo</a>";
    }
} else {
    // El usuario no existe
    echo "Usuario o contraseña incorrecta. <a href='ingreso.html'>Intentar de nuevo</a>";
}

$conn->close();
?>