<?php
    include 'conexion.php';

    session_start();
    $varSesion = $_SESSION['usuario'];
    if ($varSesion == null || $varSesion == '') {
        echo 'No se encontró una sesión activa válida para acceder al módulo';
        header("location: ../html/home.html");
        exit();
    }


    $nombre = $_POST['Nombre'];
    $costo = $_POST['Costo'];
    $stock = $_POST['CantidadStock'];


    $sql = mysqli_query($con, "INSERT INTO productos(Id,Nombre,Costo,CantidadStock) values (0,'$nombre','$costo','$stock')");

    if($sql){
        header("location: ../php/editarBuscarEliminarProducto.php");
        echo "<script>alert('El producto se agregó correctamente');</script>";
    } else{
        echo("Producto no agregado");
    }

    ?>