<?php 
include_once("admin/inc.php");
include_once("consultor.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "afiliados/consultar afiliado";
new Header($strModPath, "usersearch.php");

$tplUser=new TplLoad;

$arrayDocType = array("MS","RC","TI","CC","CE","PA","AS");
sort($arrayDocType);

if ($_POST["submit"]) {
	
	$strDoc = $_POST["doc"];
	$numDocType = (int)($_POST["doc-type"]);
	$strTypeDoc = $arrayDocType[$numDocType];	
	$consultor = new Consultor();			
	print_r($consultor->getDataUser($strTypeDoc, $strDoc));
	
}else{
//	include_once("header-inc.php");
//	$strModPath = "afiliados/consultar afiliado";
//	new Header($strModPath, "usersearch.php");	
//	$tplUser=new TplLoad;
	
	
	$numDocType=0;
	foreach ($arrayDocType as $strDocType){	
		$arrayDocItem[$numDocType]["num"] = $numDocType;
		$arrayDocItem[$numDocType]["item"] = $strDocType;
		$numDocType++;
	}
	$tplUser->assign("formulario", "ok");
	$tplUser->assign("optArray", $arrayDocItem);
	$tplUser->display("usersearch.tpl");

//	include_once("footer-inc.php");
//	new Footer();
}

$tplUser->display("usersearch.tpl");

include_once("footer-inc.php");
new Footer();

?>