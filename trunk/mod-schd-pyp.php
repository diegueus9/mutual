<?php
include_once("admin/inc.php");

if (!$logManager->isLogged()){	
	redirect("index.php");
}

include_once("header-inc.php");
new Header("programación/p y p", "mod-schd-pyp.php");

$tplSelect=new TplLoad;
$tplSelect->display("mod-schd-pyp.tpl");

include_once("footer-inc.php");
new Footer();

?>