<?php

$strAddPath="";

if (isset($strAdminArea))
	$strAddPath="../";

// include general options file
if (file_exists($strAddPath."admin/config/general_inc.php"))
	include($strAddPath."admin/config/general_inc.php");

// include general classes file
if (file_exists($strAddPath."admin/config/classes_inc.php"))
	include($strAddPath."admin/config/classes_inc.php");	
	
// include Smarty loaded class whit setted opitions 
if (file_exists($strAddPath."admin/classes/TplLoad.php"))
	include($strAddPath."admin/classes/TplLoad.php");
	
// include miscellaneous functions 
if (file_exists($strAddPath."miscellaneous.php"))
	include($strAddPath."miscellaneous.php");

?>