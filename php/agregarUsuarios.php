<?php
    include 'conexion.php';

    session_start();
    $varSesion = $_SESSION['usuario'];
    if ($varSesion == null || $varSesion == '') {
        echo 'No se encontró una sesión activa válida para acceder al módulo';
        header("location: ../html/home.html");
        exit();
    }


    $nombre = $_POST['nombre'];
    $fechaNac = $_POST['fechaNac'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $paisRes = $_POST['paisRes'];
    $numeroTel = $_POST['numeroTel'];
    $genero = $_POST['genero'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $tipoUsuario ?? $tipoUsuario = 1;

    $sql = mysqli_query($con, "INSERT INTO usuarios(Id,nombre,fechaNacimiento,correoElectronico,contraseña,paisResidencia,numeroTelefono,genero,edad, tipoUsuario) values (0,'$nombre','$fechaNac','$email', '$pass', '$paisRes', '$numeroTel', '$genero', 21, $tipoUsuario)");

    if($sql){
        header("location: ../php/editarBuscarEliminarUsuario.php");
        echo "<script>alert('El usuario se agregó correctamente');</script>";
    } else{
        echo("Usuario no agregado");
    }

    ?>