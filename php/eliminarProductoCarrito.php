<?php

    session_start();
    $varSesion = $_SESSION['usuario'];
    if ($varSesion == null || $varSesion == '') {
        echo 'No se encontró una sesión activa válida para acceder al módulo';
        header("location: ../html/home.html");
        exit();
    }

    $indice = $_POST['idItemCarrito'];

    unset($_SESSION['carrito'][$indice]);

    header("location: carrito.php");

?>