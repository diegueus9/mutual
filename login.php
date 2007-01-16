<?php
include_once("admin/inc.php");



if ($_POST["submit"]){
	
	include("loginmanager.php");	
	$loginManager = new LoginManager($_POST["username"], md5($_POST["password"]));
	if (!$loginManager->isLogged()) {
		$strError = "Error al momento del ingreso, por favor ";
		$strError .= "verifique sus datos";
		$boolLoginOk = false;
	}else {		
		//$loginManager->redirect();
		redirect("index.php");
	}
	
}

include_once("header-inc.php");
new Header("");
	
$tplLogin = new TplLoad;
if ($_POST["submit"] && !$boolLoginOk) {		
	$tplLogin->assign("error", $strError);
}

$tplLogin->display("login.tpl");

?>