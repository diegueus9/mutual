<?php
include_once("admin/inc.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
new Header("programación", "mod-schedule.php");

$tplSelect=new TplLoad;
$tplSelect->display("mod-schedule.tpl");

include_once("footer-inc.php");
new Footer();

?>

