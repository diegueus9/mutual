<?php 
include_once("admin/inc.php");
include_once("generador_metas.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "programación/p y p/generar metas";
new Header($strModPath, "genmetas.php");

$tplUser=new TplLoad;

$arrayDocType = array("MS","RC","TI","CC","CE","PA","AS");
sort($arrayDocType);

if ($_POST["submit"]) {
	
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
	}
		
}else{
	
	$numDocType=0;
	foreach ($arrayDocType as $strDocType){	
		$arrayDocItem[$numDocType]["num"] = $numDocType;
		$arrayDocItem[$numDocType]["item"] = $strDocType;
		$numDocType++;
	}
	$tplUser->assign("formulario", "ok");
	$tplUser->assign("optArray", $arrayDocItem);

}

$tplUser->display("usersearch.tpl");

include_once("footer-inc.php");
new Footer();

?>