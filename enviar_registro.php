<?php
include("conexion_registro.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Cliente = $_POST["ID_Cliente"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $contraseña = $_POST["contraseña"];
    

    $consulta = "INSERT INTO Cliente(ID_Cliente, nombre, apellidos, telefono, email, direccion, contraseña)
    VALUES ('$ID_Cliente', '$nombre', '$apellidos', '$telefono', '$email', '$direccion', '$contraseña')";

    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado) {
        echo "Registro exitoso";
    } else {
        echo "Fallo al registrar";
    }

    header("Location: confirmacion.html");
} else {
    header("Location: registro.html");
}
?>



