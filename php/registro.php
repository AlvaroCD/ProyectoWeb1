<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $fechaNac = $_POST['fechaNac'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $paisRes = $_POST['paisRes'];
    $numeroTel = $_POST['numeroTel'];
    $genero = $_POST['genero'];

    $sql = mysqli_query($con, "INSERT INTO usuarios(Id,nombre,fechaNacimiento,correoElectronico,contraseña,paisResidencia,numeroTelefono,genero,edad) values (0,'$nombre','$fechaNac','$email', '$pass', '$paisRes', '$numeroTel', '$genero', 21)");

    if($sql){
        header("location: ../html/login.html");
    } else{
        echo("Usuario no agregado");
    }

    ?>