<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ingreso.html"); // Redirigir al login si no está logueado
    exit();
}

include 'db_connection.php';

// Obtener información del usuario
$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT * FROM cliente WHERE ID_Cliente = '$usuario_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
} else {
    echo "Error al obtener los datos del usuario.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Perfil - HAKUNA MATATA PETS</title>
    <link rel="stylesheet" href="CSS/style_perfil.css" />
    <link rel="stylesheet" href="CSS/style_base.css" />
    <link rel="stylesheet" href="CSS/estilo_board.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header id="masthead" class="site-header header-main-wrapper">
      <h1>HAKUNA MATATA PETS</h1>
      <nav>
			<ul class="nav-links">
			  <li><a href="index.html"><strong>INICIO</strong></a></li>
			  <li><a href="quienesomos.html"><strong>QUIÉNES SOMOS</strong></a></li>
			  <li><a href="servicios.php"><strong>SERVICIOS</strong></a></li>
			  <li><a href="registro.html"><strong>REGISTRO</strong></a></li>
			  <li><a href="ingreso.html"><strong>INGRESO</strong></a></li>
        <li><a href="cerrar_sesion.php"><strong>CERRAR SESION</strong></a></li>
			</ul>
			<button class="menu-toggle">Menú</button>
		  </nav>
    </header>

    <div class="container">
      <div class="row" style="justify-content: center">
        <div class="col-6">
          <h2>Perfil de Usuario</h2>
          <p><strong>Nombre:</strong> <?php echo $usuario['nombre']; ?></p>
          <p><strong>Apellidos:</strong> <?php echo $usuario['apellidos']; ?></p>
          <p><strong>Teléfono:</strong> <?php echo $usuario['telefono']; ?></p>
          <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
          <p><strong>Dirección:</strong> <?php echo $usuario['direccion']; ?></p>
        </div>
      </div>
    </div>

    <?php include 'PHP/index.php' ?>

    <footer>
      <h4>Informacion de contacto</h4>
      <ul>
        <li>Telefono: 1234567</li>
        <li>Correo: hakunamatatapets@gmail.com</li>
        <li>Direccion: Calle 10 76 18</li>
      </ul>
      <p>@Copyright 2050 de nadie. Todos los derechos revertidos</p>
    </footer>
  </body>
</html>
<?php
$conn->close();
?>