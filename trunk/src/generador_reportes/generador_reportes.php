<?php
require('fpdf.php');

class GePDF extends FPDF
{
//Cabecera de p�gina
function Header()
{
	global $title;
	//Logo
	$this->Image('img/complete-head.jpg',20,20,170,30);
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Calculamos ancho y posici�n del t�tulo.
	$w=$this->GetStringWidth($title)+6;
	$this->SetX((210-$w)/2);
	//Colores de los bordes, fondo y texto
	$this->SetDrawColor(0,80,180);
	$this->SetFillColor(230,230,0);
	$this->SetTextColor(220,50,50);
	//Ancho del borde (1 mm)
	$this->SetLineWidth(1);
	//T�tulo
	$this->Cell($w,9,$title,1,1,'C',1);
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

function abrir(){
}
}

//Creaci�n del objeto de la clase heredada
$pdf=new PDF();
$pdf->SetTitle("Reporte");
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);


$pdf->SetY(50);
for($i=1;$i<=40;$i++){
	//$pdf->SetMargins(2.0,2.0,2.0);
	$pdf->Write(5,'Imprimiendo l�nea n�mero '.$i.,0,1);
	$pdf->Ln();
	}
$pdf->Output();
?>
