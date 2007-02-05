<?php 
include_once("admin/inc.php");

include("fileparser.php");
require("loader.php");
require("comparador.php");


if (!$logManager->isLogged()){	
	redirect("index.php");
}

if (!isset($_POST["submit"])) {
	//redirect("index.php");
	echo "no se ha enviado ningun archivo<br>";
}

include_once("header-inc.php");
$strModPath = "afiliados/cargar archivo/ver resultados";
new Header($strModPath, "loadfile.php");


echo "<!-- ";
$tplLoadFile=new TplLoad;

if (isset($_FILES["userfile"])) {
	
	$arrayFile = $_FILES["userfile"];	
	$flp = new FileParser();	
	$flp->loadFile($arrayFile);
		
	$load= new LoaderDB($flp->getArrayData());	
	$load->Load();
	
	$comp= new Comparador();	
	$comp->ejecutarProcedimiento();
	
	$tplLoadFile->assign("usersUpdate", $comp->getCantidadUsuariosActualizados());	
	$tplLoadFile->assign("newUsers", $comp->getCantidadUsuariosNuevos());	
	$tplLoadFile->assign("suspendUsers", $comp->getCantidadUsuariosSuspendidos());	

}
echo "--> ";
$tplLoadFile->display("loadfile.tpl");

include_once("footer-inc.php");
new Footer();


?>