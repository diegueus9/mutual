<?php
include_once("admin/inc.php");

class Footer{
	
	public function __construct(){
		
		$tplHeader = new TplLoad;			
		$tplHeader->display("footer.tpl");		
		
	}
	
}
?>