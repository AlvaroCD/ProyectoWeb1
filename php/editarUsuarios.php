<?php
    include 'conexion.php';

    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idUsuario'])) {
            $idUsuario = $_POST['idUsuario'];
            $nombre = $_POST['nombre'];
            $fechaNac = $_POST['fechaNac'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $paisRes = $_POST['paisRes'];
            $numeroTel = $_POST['numeroTel'];
            $genero = $_POST['genero'];
            $tipoUsuario = $_POST['tipoUsuario'];

            $tipoUsuario ?? $tipoUsuario = 1;

            $sql = mysqli_query($con, "UPDATE usuarios SET 
                nombre = '$nombre', 
                fechaNacimiento = '$fechaNac', 
                correoElectronico = '$email', 
                contraseña = '$pass', 
                paisResidencia = '$paisRes',
                numeroTelefono = '$numeroTel',
                genero = '$genero',
                tipoUsuario = '$tipoUsuario' WHERE Id = $idUsuario");
                if($sql){
                    header("location: ../php/editarBuscarEliminarUsuario.php");
                    echo "<script>alert('La información del usuario se actualizó correctamente');</script>";
                }
        }
    }
 else{
    echo("Información no actualizada");
}

?>