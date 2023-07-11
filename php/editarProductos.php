<?php
    include 'conexion.php';

    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            $nombre = $_POST['Nombre'];
            $costo = $_POST['Costo'];
            $stock = $_POST['CantidadStock'];

            $sql = mysqli_query($con, "UPDATE productos SET 
                Nombre = '$nombre', 
                Costo = '$costo', 
                CantidadStock = '$stock' WHERE Id = $idProducto");
                if($sql){
                    header("location: ../php/editarBuscarEliminarProducto.php");
                    echo "<script>alert('La información del producto se actualizó correctamente');</script>";
                }
        }
    }
 else{
    echo("Información no actualizada");
}

?>