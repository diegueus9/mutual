<?php 
include_once("admin/inc.php");
include_once("programador_servicios.php");
include_once("matriz_programacion.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "programacion/servicios/programación de disponibilidad";
new Header($strModPath, "availability.php", "ok");

$tplAvlt=new TplLoad;
$prgSevice = new ProgramadorServicios();
$mtrProg = new MatrizProgramacion();

if ($_POST["submit"]) {
	
	$strServicio = $_POST["servicio"];
	$strUnAtencion = $_POST["atencion"];
	$strProfecional = $_POST["profecional"];
	$strFecha = $_POST["fecha"];
	$StrHoraInicial = $_POST["inicial"];
	$strHorafinal = $_POST["final"];
	
	$prgSevice->agregarDatos($strServicio, $strUnAtencion, $strProfecional, $strFecha, $StrHoraInicial, $strHorafinal);	
		
}

$tplAvlt->assign("servicios", $prgSevice->getServicios());
$tplAvlt->assign("atencion", $prgSevice->getUnidadAtencion());
$tplAvlt->assign("profecional", $prgSevice->getProfesionales());
$tplAvlt->assign("matriz", $mtrProg->getMatriz());

$tplAvlt->display("availability.tpl");

include_once("footer-inc.php");
new Footer();


?>