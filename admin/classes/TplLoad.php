<?php 
require($strProgramPath . "/admin/libs/Smarty.class.php");
class TplLoad extends Smarty 
{
public function TplLoad()
{	
	global $strProgramPath;
	
	$this->Smarty();	
	$this->template_dir = $strProgramPath."/admin/templates_src/";	
	$this->compile_dir = $strProgramPath."/admin/config/templates_c/";
	$this->config_dir = $strProgramPath."/admin/config/configs/";
	$this->cache_dir = $strProgramPath."/admin/config/cache/";
		
	$this->caching = false;
   }

}
?> 