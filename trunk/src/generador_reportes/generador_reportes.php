<?php
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de p�gina
function Header()
{
	//Logo
	$this->Image('img/complete-head.jpg',20,20,170,30);
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//$this->SetXY(20,20);
	//Movernos a la derecha
	$this->Cell(80);
	//T�tulo
	$this->Cell(20,10,'Title',0,0,'C');
	//Salto de l�nea
	$this->Ln(10);
}

//Pie de p�gina
function Footer()
{
	//Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//N�mero de p�gina
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//Creaci�n del objeto de la clase heredada
$pdf=new PDF();
$pdf->SetTitle("Reporte");
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);
//$pdf->SetMargins(2.0,2.0,2.0);

$pdf->SetY(50);
for($i=1;$i<=40;$i++){
	//$pdf->SetMargins(2.0,2.0,2.0);
	$pdf->Write(5,"Imprimiendo l�nea n�mero '.$i.' y sin saber que mas escribir para probar la alineacion de esta cosa, no he podido cuadrar lo de las margenes.....mmmm\n pero no se si el salto de linea canciona",0,1);
	//$pdf->Ln();
	}
$pdf->Output();
?>
