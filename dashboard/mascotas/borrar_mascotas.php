<?php
include '../funciones.php';
$config = include '../config.php';
$resultado = [
    'error' => false,
    'mensaje' => ''
];
try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    $id = $_GET['id'];
    $consultaSQLcitas = "DELETE FROM citas WHERE ID_Mascota =" . $id;
    $sentenciaCitas = $conexion->prepare($consultaSQLcitas);
    $sentenciaCitas->execute();
    $consultaSQL = "DELETE FROM mascota WHERE ID_Mascota =" . $id;
    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();
    header('Location: /proyecto/dashboard/mascotas/index_mascotas.php');
} catch (PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
}
?>
<?php require "../template/header.php"; ?>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <?= $resultado['mensaje'] ?>

            </div>
        </div>
    </div>
</div>
<?php require "../template/footer.php"; ?>