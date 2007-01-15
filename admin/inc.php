<?php

$strAddPath="";

if (isset($strAdminArea))
	$strAddPath="../";

// include general options file
if (file_exists($strAddPath."admin/config/general_inc.php"))
	include($strAddPath."admin/config/general_inc.php");

// include Smarty loaded class whit setted opitions 
if (file_exists($strAddPath."admin/classes/TplLoad.php"))
	include($strAddPath."admin/classes/TplLoad.php");
	
if (file_exists($strAddPath."confdatabase-2.php"))
	include($strAddPath."confdatabase-2.php");

?>