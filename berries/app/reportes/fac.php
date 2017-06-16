<?php
	require_once('../lib/pdf/mpdf.php');
	
	
	
	
	$mpdf = new mPDF('c','A4');
	$mpdf-> AddPage();
	
	
	$mpdf->SetFont('Arial','','14');
	$mpdf->Image('img/log5.png',55,10,100,'C');
	$mpdf->Cell(180,12,'Factura de la Empresa Berries Export Company',0,2,'C',0);
	
	$mpdf->Ln(18);
	$mpdf->Cell(50,9,'Nombre: '.$_POST['nom'],0,0,'L');
	$mpdf->Cell(50,9,'                      											     	Clave proveedor: '.$_POST['clavep'],0,2,'L');
	
	
	$mpdf->Ln(15);
	$mpdf->Cell(50,9,'Fecha Factura: '.$_POST['fecha'],0,0,'L');
	$mpdf->Cell(50,9,'														 	  																			 		Clave Factura: '.$_POST['clavef'],0,2,'L');
	
	$mpdf->Ln(15);
	$mpdf->Cell(180,9,'Tipo de Producto: '.$_POST['tipo'],0,2,'C');
	$mpdf->Ln(15);
	$mpdf->Cell(50,9,'Cantidad: '.$_POST['cantidad'],0,0,'L');
	$mpdf->Cell(50,9,'					Precio Unitario: $ '.$_POST['precio'],0,0,'C');
	$mpdf->Cell(50,9,'														  															Total: $ '.$_POST['total'],0,2,'L');
	$mpdf->Ln(15);
	
	
	
	
	
	
	
	
	$mpdf->Output();
	
	  	
?> 