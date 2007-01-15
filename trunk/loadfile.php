<?php 
include("fileparser.php");
require("loader.php");
require("comparador.php");

$arrayFile = $_FILES["userfile"];

$flp = new FileParser();

$flp->loadFile($arrayFile);

$load= new LoaderDB($flp->getArrayData());

$load->Load();

$comp= new Comparador();

$comp->ejecutarProcedimiento();

?>