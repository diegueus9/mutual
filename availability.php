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
	$StrHoraInicial = getStrTime(intval($_POST["hora-ini"]), intval($_POST["min-ini"]), $_POST["jornada-ini"]);	
	$strHorafinal = getStrTime(intval($_POST["hora-fin"]), intval($_POST["min-fin"]), $_POST["jornada-fin"]);
	
	$prgSevice->agregarDatos($strServicio, $strUnAtencion, $strProfecional, $strFecha, $StrHoraInicial, $strHorafinal);		
}

$tplAvlt->assign("servicios", $prgSevice->getServicios());
$tplAvlt->assign("atencion", $prgSevice->getUnidadAtencion());
$tplAvlt->assign("profecional", $prgSevice->getProfesionales());
$tplAvlt->assign("horas", getNumberArray(1,12));
$tplAvlt->assign("min", getNumberArray(0,59));
$tplAvlt->assign("matriz", $mtrProg->getMatriz());
print_r($mtrProg->getMatriz());

$tplAvlt->display("availability.tpl");

include_once("footer-inc.php");
new Footer();


?>