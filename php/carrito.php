<?php
include 'conexion.php';

session_start();
$varSesion = $_SESSION['usuario'];
if ($varSesion == null || $varSesion == '') {
    echo 'No se encontró una sesión activa válida para acceder al módulo';
    header("location: ../html/home.html");
    exit();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$varCarrito = $_SESSION['carrito'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesCarrito.css">
    <title>Carrito</title>
</head>

<body>

    <!-- Inicia código de NavBar-->
    <div class="divNav">
        <nav>
            <ul>
                <a href="../php/productos.php">
                    <li class="fuenteNav"><img src="../src/naiky.png" alt=""></li>
                </a>
                <a href="#">
                    <li class="fuenteNav">Categorias</li>
                </a>
                <a href="carrito.php">
                    <li class="fuenteNav"><img src="../src/carrito.png" alt=""></li>
                </a>
                <a href="cerrarSesion.php">
                    <li class="fuenteNav">Cerrar sesión</li>
                </a>
            </ul>
        </nav>
    </div>
    <!--Termina código de NavBar -->
    <div class="global">
        <?php
        if ($varCarrito == null) {
            echo '<h3><b>No hay informacion para mostrar</h3>';
        } else {
            foreach ($varCarrito as $indice=>$producto) {
                echo '<div class="productItem">';
                echo '<img src="../src/zapato-deportivo.png">';
                echo '<b><p>IdProduct:</b> ' . $producto['id'] . '</p>';
                echo '<h3>Nombre: ' . $producto['nombre'] . '</h3>';
                echo '<p><b>Precio:<b/> $' . $producto['precio'] . '</p>';
                echo '<br>';
                
                // Botón de eliminación
                echo '<form action="eliminarProductoCarrito.php" method="POST">';
                echo '<input type="hidden" name="idItemCarrito" value="' . $indice . '">';
                echo '<button type="submit">';
                echo '<img src="../src/basura.png" alt="Eliminar">';
                echo '</button>';
                echo '</form>';
                // Mostrar la estructura HTML con los datos del usuario
                echo '</div>';
            }
        }
        ?>
    </div>
    <form action="comprar.php">
            <div class="centrarBoton">
            <button id="boton-comprar" type="submit">Comprar</button>
        </div>
    </form>
</body>

</html>