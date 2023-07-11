<?php
include 'conexion.php';

session_start();
$varSesion = $_SESSION['usuario'];
if ($varSesion == null || $varSesion == '') {
    echo 'No se encontró una sesión activa válida para acceder al módulo';
    header("location: ../html/home.html");
    exit();
}

$resultado = mysqli_query($con, "SELECT nombre FROM usuarios WHERE correoElectronico = '$varSesion'");
if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombreUsuario = $fila['nombre'];
} else {
    echo 'Error al ejecutar la consulta: ' . mysqli_error($con);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Naiky</title>
    <link rel="stylesheet" href="../css/stylesInicioAdmin.css">
</head>
<body>

<div class="divNav">
        <nav>
            <ul>
                <a href="inicioAdmin.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>


    <div class="container">
    <div class="header">
        <?php
            echo "Modulo de administrador para: $nombreUsuario";
        ?>
        </div>
        <div class="button-container">
            <a href="editarBuscarEliminarUsuario.php"><button class="button">CRUD Usuarios</button></a>
            <a href="editarBuscarEliminarProducto.php"><button class="button">CRUD Productos</button></a>
        </div>
        <div><!-- Aquí puedes agregar el contenido adicional de la página --></div>
    </div>
</body>
</html>