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

    // Consulta para obtener los usuarios
    $sql = "SELECT * FROM productos";
    $result = $con->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesEditarBuscarEliminarUsuario.css">
    <title>Editar usuarios</title>
</head>
<body>

    <div class="divNav">
        <nav>
            <ul>
                <a href="../php/inicioAdmin.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>

    <div class = "cabeceraSecundaria">
        <form action="../php/editarBuscarEliminarProducto.php">
            <h1>Ingresa el nombre del producto a buscar</h1>
            <input class = "text" type="text" name="nombreABuscar" id="">
            <button id="boton-buscar" type = "submit">Buscar</button>
        </form>
        <a href="../php/agregarProducto.php"><button id="boton-agregar">Agregar producto</button></a>
    </div>
<!-- Inicia código de listado de usuarios-->
<div class="global">

<?php

    // Verificar si se envió el formulario de búsqueda
    if (isset($_GET['nombreABuscar'])) {
        // Obtener el nombre a buscar
        $nombreABuscar = $_GET['nombreABuscar'];
        // Consulta para buscar usuarios por nombre
        $sqlSearch = "SELECT * FROM productos WHERE Nombre LIKE '%$nombreABuscar%'";
        $resultSearch = $con->query($sqlSearch);

    // Comprobar si se encontraron usuarios
    if ($resultSearch->num_rows > 0) {
        // Iterar sobre cada usuario y mostrarlos
        while ($row = $resultSearch->fetch_assoc()) {
            $id = $row["Id"];
            $nombre = $row["Nombre"];
            $costo = $row["Costo"];

            // Mostrar la estructura HTML con los datos del producto
            echo '<div class="userItem">';
            echo '<img src="../src/zapato-deportivo.png">';
            echo '<p><b>IdProduct:</b> ' . $id . '</p>';
            echo '<h3>' . $nombre . '</h3>';
            echo '<p><b>Costo:</b> $' . $costo . '</p>';

                echo '<div class="botonesEliminarEditarProductos">';
                    //Boton editar
                    echo '<form action="editarProducto.php" method="POST">';
                        echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                        echo '<button type="submit">';
                        echo '<img src="../src/editar.png" alt="Editar">';
                        echo '</button>';
                    echo '</form>';
                
                // Botón de eliminación
                echo '<form action="eliminarProducto.php" method="POST">';
                echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                echo '<button type="submit">';
                echo '<img src="../src/basura.png" alt="Eliminar">';
                echo '</button>';
                echo '</form>';
                echo '</div>';
            echo '</div>';
        }
    }
    }else{
            // Comprobar si se encontraron productos
    if ($result->num_rows > 0) {
        // Iterar sobre cada producto y mostrarlos
        while ($row = $result->fetch_assoc()) {
            $id = $row["Id"];
            $nombre = $row["Nombre"];
            $costo = $row["Costo"];

            // Mostrar la estructura HTML con los datos del usuario
            echo '<div class="userItem">';
            echo '<img src="../src/zapato-deportivo.png">';
            echo '<p><b>IdProduct:</b> ' . $id . '</p>';
            echo '<h3>' . $nombre . '</h3>';
            echo '<p><b>Costo:</b> $' . $costo . '</p>';

                echo '<div class="botonesEliminarEditarProductos">';
                    //Boton editar
                    echo '<form action="editarProducto.php" method="POST">';
                        echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                        echo '<button type="submit">';
                        echo '<img src="../src/editar.png" alt="Editar">';
                        echo '</button>';
                    echo '</form>';
                
                // Botón de eliminación
                echo '<form action="eliminarProducto.php" method="POST">';
                echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                echo '<button type="submit">';
                echo '<img src="../src/basura.png" alt="Eliminar">';
                echo '</button>';
                echo '</form>';
                echo '</div>';
            echo '</div>';
        }
    }
    }
  ?>
  </div>
      <!-- Termina código de listado de usuarios-->
</body>
</html>