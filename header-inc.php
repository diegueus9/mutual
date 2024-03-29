<?php
include_once("admin/inc.php");

class Header{
	
	private $strAppPath = "";	
	
	public function __construct($strAppPath, $strScriptName, $cal=""){
		
		global $logManager;
		
		$tplHeader = new TplLoad;
		
		if (!$logManager->isLogged()){
			$tplHeader->assign("appPath", "ingreso");
		}else{
			
			if (isset($strAppPath) && $strAppPath != "") {
				$this->strAppPath = "/".$strAppPath;				
				$tplHeader->assign("menu", "ok");
			}
			if (isset($strScriptName) && $strScriptName != "") {
				$tplHeader->assign("css", ereg_replace(".php", "",$strScriptName));
			}
			if (isset($cal) && $cal == "ok" ) {
				$tplHeader->assign("cal", "ok");
			}
			$tplHeader->assign("appPath", "inicio".$this->strAppPath);								
		}
		
		$tplHeader->display("header.tpl");		
		
	}
	
	
}
?>