<?php 
include_once("admin/inc.php");
include_once("generador_metas.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "programaci�n/p y p/generar metas";
new Header($strModPath, "goalsgenerator.php");

$tplUser=new TplLoad;

if ($_POST["submit"]) {
	$goalsType = (int)($_POST["goals-type"]);
	$goalgener=new GeneradorMetas();
	$goalgener->generarMetas();
	$arrayGoals=$goalgener->getMetas($goalsType);
	$goalgener->generarListasProgramas();
	if ($goalsType==0){
		$tplUser->assign("mensaje", "a�o");
	}
	else if ($goalsType==1){
		$tplUser->assign("mensaje", "mes");
	}
	else {
		$tplUser->assign("mensaje", "dia");
	}
	if (count($arrayGoals)>0) {
		$tplUser->assign("data", $arrayGoals);
	}else {
		$tplUser->assign("error", "Las Metas no se pudieron generar");
		$tplUser->assign("formulario", "ok");
	}
		
}else{
	
	$tplUser->assign("formulario", "ok");

}

$tplUser->display("goalsgenerator.tpl");

include_once("footer-inc.php");
new Footer();

?>