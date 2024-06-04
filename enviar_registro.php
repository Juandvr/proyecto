<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $ID_Cliente = $_POST['ID_Cliente'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $password = $_POST['contraseña'];

    // Encriptar la contraseña
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    // Insertar en la base de datos
    $sql = "INSERT INTO cliente (ID_Cliente, nombre, apellidos, telefono, email, direccion, contraseña)
            VALUES ('$ID_Cliente', '$nombre', '$apellidos', '$telefono', '$email', '$direccion', '$password_hash')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso. <a href='ingreso.html'>Iniciar sesión</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>