<?php
require('fpdf.php');

class PDF extends FPDF
{
	function Header()
	{
		$this->Image('img_pdf/complete-head.jpg',140,10,60,20);
		//Arial bold 15
		$this->SetFont('Arial','B',15);
		//Calculamos ancho y posición del título.
		$w=$this->GetStringWidth($this->title)+6;
		$this->SetX((210-$w)/2);
		//Colores de los bordes, fondo y texto
		$this->SetTextColor(40,40,255);
		//Ancho del borde (1 mm)
		//Título
		$this->Cell($w,9,$this->title,0,1,'C',0);
		//Salto de línea
		$this->Ln(10);
	}

	function Footer()
	{
		//Posición a 1,5 cm del final
		$this->SetY(-15);
		//Arial itálica 8
		$this->SetFont('Arial','I',8);
		//Color del texto en gris
		$this->SetTextColor(128);
		//Número de página
		$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
	}
	
	function ChapterTitle($num,$label)
	{
		//Arial 12
		$this->SetFont('Arial','',12);
		//Color de fondo
		$this->SetFillColor(200,220,255);
		//Título
		$this->Cell(0,6,"Capítulo $num : $label",0,1,'L',1);
		//Salto de línea
		$this->Ln(4);
	}
	
	function ChapterBody($file)
	{
		//Leemos el fichero
		$f=fopen($file,'r');
		$txt=fread($f,filesize($file));
		fclose($f);
		//Times 12
		$this->SetFont('Times','',12);
		//Imprimimos el texto justificado
		$this->MultiCell(0,5,$txt);
		//Salto de línea
		$this->Ln();
	}
	
	function PrintChapter($file)
	{
		$this->AddPage();
		//$this->ChapterTitle($num,$title);
		$this->ChapterBody($file);
	}
}

class GeneradorReportePDF{
	private $pdf;
	private $nombre;
	function __construct(){
		$this->pdf=new PDF();
		$this->pdf->AliasNbPages();
	}
	public function escribirdeArchivo($nombre,$fuente,$title=""){
		$this->pdf->SetTitle($title);
		$this->pdf->PrintChapter($fuente);
		$this->pdf->Output($nombre.".pdf");
	}
	/*public function abrir($nombre){
		$this->nombre=$nombre;
	}
	public function escribir(){
		
	}
	public function cerrar(){
		$this->pdf->Output($nombre.".pdf");
	}*/
}
?>