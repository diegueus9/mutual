<?php 
include_once("admin/inc.php");
include_once("generadorgruposetareos.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "programación/p y p/generar grupos etareos";
new Header($strModPath, "groupsgenerator.php");

$tplUser=new TplLoad;

if ($_POST["submit"]) {
	$groups=new GeneradorGruposEtareos();
	$groups->generarGruposEtareos();
	$groups->generarReporteGrupos();
	$arrayGroups=$groups->getGruposEtareos();
	if (count($arrayGroups)>1) {
		$tplUser->assign("data", $arrayGroups);
	}else {
		$tplUser->assign("error", "Los grupos etareos no se pudieron generar");
		$tplUser->assign("formulario", "ok");
	}
		
}else{
	
	$tplUser->assign("formulario", "ok");

}

$tplUser->display("groupsgenerator.tpl");

include_once("footer-inc.php");
new Footer();

?>