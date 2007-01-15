<?php

class LogManager{
	
	private $strUser = null;
	private $boolLogged = false;
	
	public function __construct(){		
		session_start();
		if (isset($_SESSION["username"])) {
			$this->strUser = $_SESSION["username"];
			$this->boolLogged = true;
		}
	}
	
	public function isLogged (){
		
		// temporalmente, moidificar para verificar usuarios
		return $this->boolLogged;
		
	}
	
}


?>