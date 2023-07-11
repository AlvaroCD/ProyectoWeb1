<?php
include 'conexion.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];
        
        // Realizar la operación de eliminación en la base de datos
        $sql = "DELETE FROM usuarios WHERE Id = $idUsuario";
        $resultado = $con->query($sql);
        
        if ($resultado) {
            // Éxito en la eliminación
            echo "<script>alert('El usuario ha sido eliminado exitosamente.');</script>";
        } else {
            // Error en la eliminación
            echo "<script>alert('Ocurrió un error al eliminar el usuario.');</script>";
        }
    } else {
        echo "<script>alert('No se proporcionó un ID de usuario válido.');</script>";
    }
} else {
    echo "<script>alert('Acceso inválido al archivo.');</script>";
}
header("location: editarBuscarEliminarUsuario.php");
?>
