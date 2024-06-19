<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: ingreso.php"); // Redirigir al login si no está logueado
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      background-color: rgb(255, 255, 255);
    }

    header {
      background-color: rgb(3, 68, 46);
      padding: 30px;
      border-bottom: 1px solid #ddd;
    }

    .header-main-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .titulo_principal h1 {
      font-size: 80px;
      text-align: center;
      color: white;
      background-color: rgb(3, 68, 46);
      margin: 0 auto;
    }

    nav {
      flex: 1;
    }

    .nav-links {
      display: flex;
      flex-wrap: wrap;
      list-style: none;
      padding-left: 0;
      margin: 0;
    }

    .nav-links li {
      margin: 0 10px;
    }

    .menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
    }

    @media (max-width: 768px) {
      .nav-links {
        display: none;
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
      }

      .nav-links.show {
        display: flex;
      }

      .menu-toggle {
        display: block;
      }
    }
  </style>
</head>

<body style="background-color: rgb(255, 255, 255)">
  <div class="titulo_principal">
    <h1>HAKUNA MATATA PETS</h1>
  </div>
  <header id="masthead" class="site-header header-main-wrapper">
  <nav>
    <ul class="nav-links">
      <li><a href="index.html"><strong>INICIO</strong></a></li>
      <li><a href="quienesomos.html"><strong>QUIÉNES SOMOS</strong></a></li>
      <li><a href="servicios.php"><strong>SERVICIOS</strong></a></li>
      <li><a href="perfil.php"><strong>PERFIL</strong></a></li>
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
  <script src="/proyecto/scripts/editar.js"></script>
</body>

</html>
<?php
$conn->close();
?>