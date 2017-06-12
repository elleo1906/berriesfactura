<?php

require("berries/fpdf/fpdf.php");
class PDF extends FPDF
{
	
}

//declaracion de la hoja
$pdf=new PDF('P','mm','Letter');
$pdf->SetMargins(20,18);
$pdf->AliasNbPages();
$pdf->AddPage();
//datos del titulo 

$pdf->SetTextColor(0x00,0x00,0x00);
$pdf->SetFont("Arial","b",14);
$pdf->Cell(0,5,'Factura de la empresa Berries Export Company',0.1,'C');
$pdf->Ln(10);
$pdf->Cell(0,5,'Empresa: '.$_POST['nombreP'],0.1,'C');


//datos de conexion 

mysql_connect("localhost","root","root1905");
mysql_select_db("berries");

$pdf->Ln(18);

$sql="SELECT * FROM operacion";
$rec=mysql_query($sql);
while($row=mysql_fetch_array($rec)){
	$pdf->Cell(30,5,$row['clavenumero'],1,0,'C');
	$pdf->Cell(30,5,$row['numero1'],1,0,'C');
	$pdf->Cell(30,5,$row['numero2'],1,0,'C');
	$pdf->Cell(30,5,$row['resultado'],1,0,'C');
	$pdf->Ln(18);

}


$pdf->Output();


?>