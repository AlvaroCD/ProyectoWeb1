<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$id = $_POST['idProducto'];
$nombre = $_POST['nombre'];
$precio = $_POST['costo'];

$producto = array(
    'id' => $id,
    'nombre' => $nombre,
    'precio' => $precio,
    // Agrega más detalles en siguiente etapa
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesProductos.css">
    <title>Carrito</title>
</head>
<body>

        <!-- Inicia código de NavBar-->
        <div class="divNav">
            <nav>
                <ul>
                    <a href="../php/productos.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>                    
                    <a href="#"><li class="fuenteNav">Categorias</li></a>
                    <a href="carrito.php"><li class="fuenteNav"><img src="../src/carrito.png" alt=""></li></a>  
                    <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
                </ul>
            </nav>
        </div>
        <!--Termina código de NavBar -->


    <?php
        array_push($_SESSION['carrito'], $producto);
        header("location: carrito.php");
    ?>
</body>
</html>
              