<?php 
include_once("admin/inc.php");
include_once("generador_metas.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "programación/p y p/generar metas";
new Header($strModPath, "goalsgenerator.php");

$tplUser=new TplLoad;

if ($_POST["submit"]) {
	/*
	$strDoc = $_POST["doc"];
	$numDocType = (int)($_POST["doc-type"]);
	$strTypeDoc = $arrayDocType[$numDocType];	
	$consultor = new Consultor();
	$arrayDoc = $consultor->getDataUser($strTypeDoc, $strDoc);
	if (count($arrayDoc)>1) {
		$strPhotoFile = "img-files/".$arrayDoc["COD_TIPO_IDENTIFICACION2"].$arrayDoc["NUMERO_IDENTIFICACION"].".gif";	
		if (file_exists($strPhotoFile)) {
			$tplUser->assign("photo",$strPhotoFile);
		}
		$tplUser->assign("data", $arrayDoc);
	}else {
		$tplUser->assign("error", "El usuario no se ha encontrado, por favor verifique sus datos");
		$tplUser->assign("formulario", "ok");
		$tplUser->assign("optArray", $arrayDocItem);
	}*/
	$goalsType = (int)($_POST["goals-type"]);
	$goalgener=new GeneradorMetas();
	$goalgener->generarMetas();
	$arrayGoals=$goalgener->getMetas($goalsType);
	$goalgener->generarListasProgramas();
	if ($goalsType==0){
		$tplUser->assign("mensaje", "año");
	}
	else if ($goalsType==1){
		$tplUser->assign("mensaje", "mes");
	}
	else {
		$tplUser->assign("mensaje", "dia");
	}
	if (count($arrayGoals)>1) {
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