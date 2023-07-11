<?php
    include 'conexion.php';

    session_start();

    // Obtener los valores del formulario
    $emailLogin = $_POST['emailLogin'];
    $passLogin = $_POST['passLogin'];
    $tipoUsuario = 0;

    // Realizar la consulta SQL
    $sqlClient = mysqli_query($con, "SELECT * FROM usuarios WHERE correoElectronico = '$emailLogin' AND contraseña = '$passLogin' AND tipoUsuario = 1");
    $sqlAdmin = mysqli_query($con, "SELECT * FROM usuarios WHERE correoElectronico = '$emailLogin' AND contraseña = '$passLogin' AND tipoUsuario = 2");

    // Verificar los datos de inicio de sesión
    if (mysqli_num_rows($sqlClient) == 1) {
        // Inicio de sesión correcto
        $_SESSION['usuario'] = $emailLogin;
        header('Location: ../php/productos.php');
        exit();
    } 
    else if(mysqli_num_rows($sqlAdmin) == 1) {
        // Inicio de sesión correcto
        $_SESSION['usuario'] = $emailLogin;
        header('Location: ../php/inicioAdmin.php');
        exit();
    }
    else {
        // Inicio de sesión incorrecto
        echo "<script>alert('El correo electrónico o la contraseña son incorrectos.');</script>";
    }
?>