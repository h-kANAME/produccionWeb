<?php
include_once ('fpdf/fpdf.php');
include_once ('inc/con_db.php');
$id_producto = $_REQUEST['id_producto'];

$query = "SELECT * FROM productos WHERE destacado = 'true'";
$resultado = $connect->query($query);

foreach ($resultado as $productos){
	$modelo = $productos['modelo'];
	$marca = 'Coso';
	$descripcion = $productos['descripcion'];
	$imagen = $productos['imagen'];
}
echo $modelo . '<br>';
echo $marca . '<br>';
echo $descripcion . '<br>';
echo '<img src="'.$imagen. '"></a>' . '<br>';

	if(!$connect){

		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf -> AddPage();
		$pdf -> SetFont('Arial', 'B', '11');
		
		$pdf->Ln(20);
		$pdf->Image('img/Logos_Banners/logoKYZpdf.png',10,8,80);

		$pdf->Cell(0,10,'Ficha tecnica');
		$pdf->Ln(20);
		$pdf->Cell(0,10,'Modelo del producto: '. $modelo);
		$pdf->Ln(20);
		$pdf->Cell(0,10,'Marca del producto: '. $marca);
		$pdf->Ln(20);
		$pdf->MultiCell(0,10,'Caracteristicas del producto: '. $descripcion);
		$pdf->Ln(20);
		$pdf->Image ($imagen);

		$pdf -> Output();
	}
?>