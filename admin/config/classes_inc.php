<?php
//incluye el administrador de ingreso
if (file_exists($strAddPath."logmanager.php")) {
	include_once($strAddPath."logmanager.php");
	$logManager = new LogManager();
}
?>