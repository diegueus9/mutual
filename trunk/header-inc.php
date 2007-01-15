<?php
include_once("admin/inc.php");

class Header{
	
	private $strAppPath = "";
	
	public function __construct($strAppPath){
		
		global $logManager;
		
		$tplHeader = new TplLoad;
		
		if (!$logManager->isLogged()){
			$tplHeader->assign("appPath", "ingreso");
		}else{
			
			if (isset($strAppPath) && $strAppPath != "") {
				$this->strAppPath = "/".$strAppPath;
			}			
			$tplHeader->assign("appPath", "inicio".$this->strAppPath);
								
		}
		
		$tplHeader->display("header.tpl");		
		
	}
	
}
?>