<?php
include 'conexion.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idProducto'])) {
        $idProducto = $_POST['idProducto'];
        
        // Realizar la operación de eliminación en la base de datos
        $sql = "DELETE FROM productos WHERE Id = $idProducto";
        $resultado = $con->query($sql);
        
        if ($resultado) {
            // Éxito en la eliminación
            echo "<script>alert('El producto ha sido eliminado exitosamente.');</script>";
        } else {
            // Error en la eliminación
            echo "<script>alert('Ocurrió un error al eliminar el producto.');</script>";
        }
    } else {
        echo "<script>alert('No se proporcionó un ID de producto válido.');</script>";
    }
} else {
    echo "<script>alert('Acceso inválido al archivo.');</script>";
}
header("location: editarBuscarEliminarProducto.php");
?>
