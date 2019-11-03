<?php
	include 'plantilla.php';
	require 'conexion.php';
	
	$query = "select * from vis_cliente_cuenta";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	/*columnas */
	$pdf->Cell(30,6,'No Cuenta',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'A. Paterno',1,0,'C',1);
	$pdf->Cell(30,6,'A. Materno',1,0,'C',1);
	$pdf->Cell(30,6,'CI',1,0,'C',1);
	$pdf->Cell(30,6,'Monto',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	/*rellenando celdas*/
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(30,6,$row['numcuenta'],1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['app']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['apm']),1,0,'C');
		$pdf->Cell(30,6,$row['ci'],1,0,'C');
		$pdf->Cell(30,6,$row['monto'],1,1,'C');
	}
	$pdf->Output();
?>