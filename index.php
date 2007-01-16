<?php
include_once("admin/inc.php");

include_once("header-inc.php");

if (!$logManager->isLogged()) {
	include_once("login.php");
}else {		
	new Header("menu principal");
	$tplIndex = new TplLoad();
	$tplIndex->display("index.tpl");
}

include_once("footer-inc.php");
new Footer();
?>