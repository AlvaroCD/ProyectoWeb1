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
    $idProducto = $_POST['idProducto'];
    // Consulta para obtener los datos del usuario
    $sql = "SELECT * FROM productos WHERE Id = $idProducto";
    $result = $con->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylesEditarProductos.css">
    <title>Editar producto</title>
</head>
<body>

    <div class="divNav">
        <nav>
            <ul>
                <a href="editarBuscarEliminarProducto.php"><li class="fuenteNav"><img src="../src/naiky.png" alt=""></li></a>
                <a href="cerrarSesion.php"><li class="fuenteNav">Cerrar sesión</li></a>
            </ul>
        </nav>
    </div>

<?php
// Verificar si se encontró el producto
if ($result->num_rows > 0) {
    // Obtener los datos del usuario
    $row = $result->fetch_assoc();
    $id = $row["Id"];
    $nombre = $row['Nombre'];
    $costo = $row['Costo'];
    $stock = $row['CantidadStock'];


    // Mostrar el formulario con los datos prellenados
    echo '
    <form action="../php/editarProductos.php" method="POST">
        <div class="editarProducto">
            <h3>Nombre del producto </h3>
            <input type="text" class="text" name="Nombre" value="' . $nombre . '">
            <h3>Costo</h2>
            <input type="decimal" id="costo" name="Costo" class="text" value="' . $costo . '">
            <h3>Cantidad en stock</h3>
            <input type="text" class="text" name="CantidadStock" value="' . $stock . '">


            <input type="hidden" name="idProducto" value="' . $id . '">
            <button type="submit">Actualizar producto</button>
        </div>
    </form>';
} else {
echo 'No se encontró el producto.';
}
?>
</body>
</html>



