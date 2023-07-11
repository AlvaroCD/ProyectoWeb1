<?php
include 'conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../fpdf185/fpdf.php');
require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');


session_start();
$varSesion = $_SESSION['usuario'];
if ($varSesion == null || $varSesion == '') {
    echo 'No se encontró una sesión activa válida para acceder al módulo';
    header("location: ../html/home.html");
    exit();
}

$resultado = mysqli_query($con, "SELECT nombre, correoElectronico FROM usuarios WHERE correoElectronico = '$varSesion'");
if ($resultado) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombreUsuario = $fila['nombre'];
    $correo = $fila['correoElectronico'];
} else {
    echo 'Error al ejecutar la consulta: ' . mysqli_error($con);
    exit();
}

$varCarrito = $_SESSION['carrito'];



// Crear una instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Configurar fuentes y tamaños
$pdf->SetFont('Arial', 'B', 16);

// Título del PDF
$pdf->Cell(0, 10, 'Carrito de compras', 0, 1, 'C');
$pdf->Ln(10);

// Contenido del PDF
$pdf->SetFont('Arial', '', 12);

// Verificar si hay productos en el carrito
if (count($varCarrito) > 0) {
    $totalPedido = 0;
    foreach ($varCarrito as $producto) {
        $pdf->Cell(40, 10, 'ID:', 0);
        $pdf->Cell(50, 10, $producto['id'], 0, 1);
        $pdf->Cell(40, 10, 'Nombre:', 0);
        $pdf->Cell(50, 10, $producto['nombre'], 0, 1);
        $pdf->Cell(40, 10, 'Precio:', 0);
        $pdf->Cell(50, 10, $producto['precio'], 0, 1);
        $pdf->Ln(10);
        $totalPedido += $producto['precio'];
    }
    $pdf ->Cell(40, 10, 'Total: $', 0);
    $pdf->Cell(50, 10, $totalPedido, 0, 1);

} else {
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'No hay información para mostrar', 0, 1, 'C');
}

// Generar el nombre del archivo PDF
$nombreArchivoPDF = 'carrito_' . $correo . '.pdf';

// Guardar el archivo PDF en una ubicación temporal en el servidor
$pdf->Output('F', $nombreArchivoPDF);

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = "a21310384@ceti.mx";
    $mail->Password = "jrvanhckakmmpvxz";
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->From = "a21310384@ceti.mx";
    $mail->FromName = "Naiky Project Customer Service";
    $mail->addAddress($correo, "COMPRAS NP");
    $mail->isHTML(true);
    $mail->Subject = 'Resumen de compra';
    $mail->Body = 'Gracias por tu compra, a continuacion podras encontrar adjunto a este correo un archivo PDF con el resumen de tu compra.';
    $mail->addAttachment('carrito_'.$correo.'.pdf');
    $mail->send();
    echo 'Correo enviado';
    //$mail->smtpClose();
    // Vaciar el carrito
    unset($_SESSION['carrito']);
} catch (Exception $e) {
    echo 'Mensaje '.$mail->ErrorInfo;
}
header("location: ../productos.php");
?>
