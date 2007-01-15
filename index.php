<?php
include_once("admin/inc.php");

include_once("header-inc.php");

if (!$logManager->isLogged()) {
	include_once("login.php");
}else {		
	new Header("menu principal");
	echo "<h1>MENU PRINCIPAL</h1>";
}

include_once("footer-inc.php");
?>