<?php
include_once("admin/inc.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
new Header("afiliados", "mod-affiliated.php");

$tplSelect=new TplLoad;
$tplSelect->display("mod-affiliated.tpl");

include_once("footer-inc.php");
new Footer();

?>
?>
