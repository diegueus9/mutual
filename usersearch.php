<?php 
include_once("admin/inc.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "afiliados/consultar afiliado";
new Header($strModPath, "usersearch.php");

$tplUser=new TplLoad;

$arrayDocType = array("MS","RC","TI","CC","CE","PA","AS");
sort($arrayDocType);
$numDocType=1;
foreach ($arrayDocType as $strDocType){	
	$arrayDocItem[$numDocType]["num"] = $numDocType;
	$arrayDocItem[$numDocType]["item"] = $strDocType;
	$numDocType++;
}
$tplUser->assign("optArray", $arrayDocItem);

$tplUser->display("usersearch.tpl");

include_once("footer-inc.php");
new Footer();

?>