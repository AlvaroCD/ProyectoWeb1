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
    <title>CRUD Usuarios</title>
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
        <div class="header">CRUD Usuarios</div>
        <div class="button-container">
            <a href="../html/agregarUsuario.html"><button class="button">Agregar usuario</button></a>
            <a href="editarBuscarEliminarUsuario.php"><button class="button">Editar usuario</button></a>
            <button class="button">Buscar usuario</button>
            <button class="button">Eliminar usuario</button>
        </div>
        <div><!-- Aquí puedes agregar el contenido adicional de la página --></div>
    </div>
</body>
</html>