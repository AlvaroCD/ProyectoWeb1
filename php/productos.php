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

    // Consulta para obtener los productos
    $sql = "SELECT * FROM productos";
    $result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesProductos.css">
    <title>Productos</title>
</head>
<body>
        <!-- Inicia código de NavBar-->
        <div class="divNav">
            <nav>
                <ul>
                    <a href="productos.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>                    
                    <a href="#"><li class="fuenteNav">Categorias</li></a>
                    <a href="carrito.php"><li class="fuenteNav"><img src="../src/carrito.png" alt=""></li></a>  
                    <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
                </ul>
            </nav>
        </div>
        <!--Termina código de NavBar -->

        <div class = "cabeceraSecundaria">
          <form action="../php/productos.php">
            <h1>Ingresa el nombre del producto a buscar</h1>
            <input class = "text" type="text" name="nombreABuscar">
            <button id="boton-buscar" type = "submit">Buscar</button>
          </form>
    </div>

<!-- Inicia código de listado de productos-->
<div class="global">

  <!--Item 1-->
<?php

// Verificar si se envió el formulario de búsqueda
if (isset($_GET['nombreABuscar'])) {
    // Obtener el nombre a buscar
    $nombreABuscar = $_GET['nombreABuscar'];
    // Consulta para buscar productos por nombre
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
        echo '<div class="productItem">';
        echo '<img src="../src/zapato-deportivo.png">';
        echo '<p><b>IdProduct:</b> ' . $id . '</p>';
        echo '<h3>' . $nombre . '</h3>';
        echo '<p><b>Costo:</b> $' . $costo . '</p>';
                //Boton agregar a carrito
                echo '<form action="agregarCarrito.php" method="POST">';
                    echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                    echo '<button type="submit">';
                    echo '<img src="../src/agregar-carrito.png" alt="AgregarCarrito">';
                    echo '</button>';
                echo '</form>';
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

      // Mostrar la estructura HTML con los datos de los productos
      echo '<div class="productItem">';
      echo '<img src="../src/zapato-deportivo.png">';
      echo '<p><b>IdProduct:</b> ' . $id . '</p>';
      echo '<h3>' . $nombre . '</h3>';
      echo '<p><b>Costo:</b> $' . $costo . '</p>';

                //Boton agregar a carrito
                echo '<form action="agregarCarrito.php" method="POST">';
                    echo '<input type="hidden" name="idProducto" value="' . $id . '">';
                    echo '<input type="hidden" name="nombre" value="' . $nombre . '">'; 
                    echo '<input type="hidden" name="costo" value="' . $costo . '">';                  
                    echo '<button type="submit">';
                    echo '<img src="../src/agregar-carrito.png" alt="AgregarCarrito">';
                    echo '</button>';
                echo '</form>';
              echo '</div>';
          }
      }
      }       
?>
</div>
      <!-- Termina código de listado de productos-->
</body>

<footer>
  <div>
      <p>Todos los derechos reservados &copy; 2023</p>
    </div>
</footer>

</html>