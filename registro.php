<?php session_start(); ?>
<?php
include 'db_connection.php';

$resultado = '';
$error = false;

if (isset($_POST['submit'])) {
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

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO cliente (ID_Cliente, nombre, apellidos, telefono, email, direccion, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $ID_Cliente, $nombre, $apellidos, $telefono, $email, $direccion, $password_hash);

    if ($stmt->execute()) {
        $resultado = "Registro exitoso. <a href='ingreso.php'>Iniciar sesión</a>";
    } else {
        $resultado = "Error: " . $stmt->error;
        $error = true;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HAKUNA MATATA PETS</title>
    <link rel="stylesheet" href="CSS/style_registro.css" />
    <link rel="stylesheet" href="CSS/style_base.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
</head>

    <?php include 'template/header.php'?>
    <!-- De acá hacia arriba NO TOCAR -->
    <?php if (!empty($resultado)) { ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-<?= $error ? 'danger' : 'success' ?>" role="alert">
                        <?= $resultado ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="container" id="formuRegistro">
        <div class="row" style="justify-content: center">
            <div class="col-6">
                <h2>REGISTRARSE</h2>
                <form method="post">
                    <input type="text" name="ID_Cliente" placeholder="Digita tu identificacion" class="form-control" /><br />
                    <input type="text" name="nombre" placeholder="Digita tu nombre" class="form-control" /><br />
                    <input type="text" name="apellidos" placeholder="Digita tus apellidos" class="form-control" /><br />
                    <input type="text" name="telefono" placeholder="Digita tu telefono" class="form-control" /><br />
                    <input type="email" name="email" placeholder="Digita tu email" class="form-control" /><br />
                    <input type="text" name="direccion" placeholder="Digita tu direccion" class="form-control" /><br />
                    <input type="password" name="contraseña" placeholder="Digita tu contraseña" class="form-control" /><br />
                    <input type="submit" name="submit" value="REGISTRARSE" class="btn btn-danger" />
                </form>
                <br />
            </div>
        </div>
    </div>
    <!--div container -->
    <br />
    <!-- De acá hacia abajo NO TOCAR -->
    <?php include 'template/footer.php'?>