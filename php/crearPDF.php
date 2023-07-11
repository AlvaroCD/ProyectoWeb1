<?php
require('../fpdf185/fpdf.php');

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

$varCarrito = $_SESSION['carrito'];

// Crear una instancia de FPDF
$pdf = new FPDF();

foreach ($varCarrito as $indice => $producto) {
    // Obtener los datos necesarios para el resumen de compra
    $idProducto = $producto[id];
    $nombreProducto = $producto[nombre]; //$_POST['nombre_producto'];
    $precioProducto = $producto[precio]; //$_POST['precio_producto'];
    // ... (obtener los demás datos necesarios)

    // Agregar una página
    $pdf->AddPage();

    // Configurar la fuente y el tamaño del texto
    $pdf->SetFont('Arial', 'B', 16);

    // Agregar contenido al PDF
    $pdf->Cell(0, 10, 'Resumen de compra', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Id del Producto', 1, 1, 'L');
    $pdf->Cell(60, 10, 'Nombre del producto', 1, 0, 'L');
    $pdf->Cell(40, 10, 'Precio', 1, 1, 'L');
    $pdf->Cell(40, 10, $idProducto, 1, 1, 'L');
    $pdf->Cell(60, 10, $nombreProducto, 1, 0, 'L');
    $pdf->Cell(40, 10, $precioProducto, 1, 1, 'L');
    // ... (agregar los demás datos necesarios)
}

if (count($varCarrito) == 0) {
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'No hay informacion para mostrar', 0, 1, 'C');
    unset($_SESSION['carrito']);
}


// Salida del PDF
$pdf->Output('resumen_compra.pdf', 'I');

?>
