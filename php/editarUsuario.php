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

    // Obtener el ID del usuario a editar
    $idUsuario = $_POST['idUsuario'];
    // Consulta para obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE Id = $idUsuario";
    $result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesEditarUsuarios.css">
    <title>Agregar usuario</title>
</head>
<body>

    <div class="divNav">
        <nav>
            <ul>
                <a href="editarBuscarEliminarUsuario.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>

<?php
// Verificar si se encontró el usuario
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $id = $row["Id"];
    $nombre = $row['nombre'];
    $fechaNac = $row['fechaNacimiento'];
    $email = $row['correoElectronico'];
    $paisRes = $row['paisResidencia'];
    $numeroTel = $row['numeroTelefono'];
    $genero = $row['genero'];
    $tipoUsuario = $row['tipoUsuario'];

    // Mostrar el formulario con los datos prellenados
    echo '
    <form action="../php/editarUsuarios.php" method="POST">
        <div class="editarUsuario">
            <h3>Nombre(s)</h3>
            <input type="text" class="text" name="nombre" value="' . $nombre . '">
            <h3>Fecha de nacimiento</h2>
            <input type="date" id="fecha" name="fechaNac" class="text" value="' . $fechaNac . '">
            <h3>Correo eletrónico</h3>
            <input type="text" class="text" name="email" value="' . $email . '">
            <h3>Contraseña</h3>
            <input type="password" name="pass" id="" class="text">
            <h3>Confirmación de contraseña</h3>
            <input type="password" name="" id="" class="text">
            <h3>País de residencia</h3>
            <select id="pais" name="paisRes">
                <option value="">Seleccione un país</option>
                <option value="Argentina"' . ($paisRes == 'Argentina' ? ' selected' : '') . '>Argentina</option>
                <option value="Brasil"' . ($paisRes == 'Brasil' ? ' selected' : '') . '>Brasil</option>
                <option value="Colombia"' . ($paisRes == 'Colombia' ? ' selected' : '') . '>Colombia</option>
                <option value="España"' . ($paisRes == 'España' ? ' selected' : '') . '>España</option>
                <option value="México"' . ($paisRes == 'México' ? ' selected' : '') .'>México</option>
                <option value="Perú"' . ($paisRes == 'Perú' ? ' selected' : '') . '>Perú</option>
                <option value="Estados Unidos"' . ($paisRes == 'Estados Unidos' ? ' selected' : '') . '>Estados Unidos</option>
                <!-- agregar más opciones de países aquí -->
            </select>
            <h3>Número de teléfono</h3>
            <input type="tel" name="numeroTel" id="" class="text" value="' . $numeroTel . '">
            <h3>Género</h3>
            <div class="radio">
                <input type="radio" id="hombre" name="genero" value="Masculino"' . ($genero == 'Masculino' ? ' checked' : '') . '>
                <label for="hombre">Hombre</label><br>
                <input type="radio" id="mujer" name="genero" value="Femenina"' . ($genero == 'Femenina' ? ' checked' : '') . '>
                <label for="mujer">Mujer</label><br>
                <input type="radio" id="otro" name="genero" value="Otro"' . ($genero == 'Otro' ? ' checked' : '') . '>
                <label for="otro">Otro</label>
            </div>
            <label for="admin">¿Es administrador?</label>
            <input class="admin" type="checkbox" id="tipoUsuario" name="tipoUsuario" value="2"' . ($tipoUsuario == 2 ? ' checked' : '') . '>
            <br>
            <input type="hidden" name="idUsuario" value="' . $id . '">
            <button type="submit">Actualizar usuario</button>
        </div>
    </form>';
} else {
echo 'No se encontró el usuario.';
}
?>
</body>
</html>



