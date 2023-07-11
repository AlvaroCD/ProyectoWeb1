<?php
    include 'conexion.php';
    session_start();
    $resultSearch = '';
    $varSesion = $_SESSION['usuario'];
    if ($varSesion == null || $varSesion == '') {
        echo 'No se encontró una sesión activa válida para acceder al módulo';
        header("location: ../html/home.html");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesAgregarUsuarios.css">
    <title>Agregar usuario</title>
</head>
<body>

    <div class="divNav">
        <nav>
            <ul>
                <a href="../php/editarBuscarEliminarUsuario.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>

    <form action="../php/agregarUsuarios.php" method="POST">
        <div class="agregarUsuario">
            <h3>Nombre(s)</h3>
            <input type="text" class="text" name="nombre">
            <h3>Fecha de nacimiento</h2>
            <input type="date" id="fecha" name="fechaNac" class="text">
            <h3>Correo eletrónico</h3>
            <input type="text" class="text" name="email">
            <h3>Contraseña</h3>
            <input type="password" name="pass" id="" class="text">
            <h3>Confirmación de contraseña</h3>
            <input type="password" name="" id="" class="text">
            <h3>País de residencia</h3>
            <select id="pais" name="paisRes" >
                <option value="">Seleccione un país</option>
                <option value="Argentina">Argentina</option>
                <option value="Brasil">Brasil</option>
                <option value="Colombia">Colombia</option>
                <option value="España">España</option>
                <option value="México">México</option>
                <option value="Perú">Perú</option>
                <option value="Estados Unidos">Estados Unidos</option>
                <!-- agregar más opciones de países aquí -->
            </select>
            <h3>Número de teléfono</h3>
            <input type="tel" name="numeroTel" id="" class="text">
            <h3>Género</h3>
                <div class="radio">
                    <input type="radio" id="hombre" name="genero" value="Masculino">
                    <label for="hombre">Hombre</label><br>
                    <input type="radio" id="mujer" name="genero" value="Femenina">
                    <label for="mujer">Mujer</label><br>
                    <input type="radio" id="otro" name="genero" value="Otro">
                    <label for="otro">Otro</label>
                </div>
                <label for="admin">¿Es administrador?</label>
                <input class="admin" type="checkbox" id="tipoUsuario" name="tipoUsuario" value="2">
                <br>
            <button type="submit">Registrar usuario</button>
        </div>
    </form>
</body>
</html>