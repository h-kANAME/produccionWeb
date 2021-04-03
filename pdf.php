<?php
include_once ('fpdf/fpdf.php');
$id_producto = $_REQUEST['id_producto'];
$productos = json_decode(file_get_contents('json/productos.json') , true);
$imprimir = $productos[$id_producto];



//print_r($a_imprimir);

foreach ($productos as $producto){

	if($productos = $imprimir){

		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf -> AddPage();
		$pdf -> SetFont('Arial', 'B', '11');
		
		$pdf->Ln(20);
		$pdf->Image('img/Logos_Banners/logoKYZpdf.png',10,8,80);

		$pdf->Cell(0,10,'Ficha tecnica');
		$pdf->Ln(20);
		$pdf->Cell(0,10,'Modelo del producto: '. $imprimir['modelo']);
		$pdf->Ln(20);
		$pdf->Cell(0,10,'Marca del producto: '. $imprimir['marca']);
		$pdf->Ln(20);
		$pdf->MultiCell(0,10,'Caracteristicas del producto: '. $imprimir['descripcion']);
		$pdf->Ln(20);
		$pdf->Image ($imprimir['imagenMax']);

		$pdf -> Output();
	}

}

?>