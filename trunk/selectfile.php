<?php 
include_once("admin/inc.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
$strModPath = "afiliados/cargar archivo";
new Header($strModPath, "selectfile.php");

$tplSelect=new TplLoad;
$tplSelect->display("selectfile.tpl");

include_once("footer-inc.php");
new Footer();

?>