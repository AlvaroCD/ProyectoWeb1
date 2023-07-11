<?php
session_start();
$varSesion = $_SESSION['usuario'];
if ($varSesion == null || $varSesion == '') {
    echo 'No se encontró una sesión activa válida para acceder al módulo';
    header("location: ../html/home.html");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Nombre de la Página</title>
    <link rel="stylesheet" href="../css/stylesInicioAdmin.css">
</head>
<body>
    <div class="container">
        <div class="header">CRUD Productos</div>
        <div class="button-container">
            <a href=""></a><button class="button">Agregar producto</button>
            <button class="button">Editar producto</button>
            <button class="button">Buscar producto</button>
            <button class="button">Eliminar producto</button>
        </div>
        <div><!-- Aquí puedes agregar el contenido adicional de la página --></div>
    </div>
</body>
</html>