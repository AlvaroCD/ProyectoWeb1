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
    <link rel="stylesheet" href="../css/stylesAgregarProductos.css">
    <title>Agregar usuario</title>
</head>
<body>

    <div class="divNav">
        <nav>
            <ul>
                <a href="../php/editarBuscarEliminarProducto.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>

    <form action="../php/agregarProductos.php" method="POST">
        <div class="agregarProducto">
            <h3>Nombre del producto</h3>
            <input type="text" class="text" name="Nombre">
            <h3>Costo</h2>
            <input type="decimal" id="fecha" name="Costo" class="text">
            <h3>Cantidad en stock</h3>
            <input type="number" class="text" name="CantidadStock">

  <!--          <h3>País de residencia</h3>
                                                                        Queda pendiente para agregar tallas NOTA; Pedir diagrama revisado a la maestra :)
            <select id="pais" name="paisRes" >
                <option value="">Seleccione un país</option>
                <option value="Argentina">Argentina</option>
                <option value="Brasil">Brasil</option>
                <option value="Colombia">Colombia</option>
                <option value="España">España</option>
                <option value="México">México</option>
                <option value="Perú">Perú</option>
                <option value="Estados Unidos">Estados Unidos</option>
                agregar más opciones de países aquí 
            </select>-->
                <br>
            <button type="submit">Registrar producto</button>
        </div>
    </form>
</body>
</html>