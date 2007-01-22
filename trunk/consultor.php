<?php
require_once("config.php");
class Consultor{
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	
	/**
	 * Esta funcion se encarga de hacer la conexión con la base de datos.
	 *
	 */
	private function conectar(){
		global $HOST;
		global $BASEDEDATOS;
		global $USUARIO;
		global $PASS;
		$this->myconn = mysql_connect($HOST,$USUARIO,$PASS);
		if (! $this->myconn){
			echo "Error al intentar conectarse con el servidor MySQL";
		exit(); 
		}

		if (! @mysql_select_db($BASEDEDATOS,$this->myconn)){
			echo "No se pudo conectar correctamente con la Base de datos";
			exit();
		}
	
	}
	public function getDataUser($docUsuario){
		global $TABLEAFILIADOS, $NI;
		$this->conectar();
		$sqlquery="SELECT * FROM `$TABLEAFILIADOS` WHERE `$NI`='$docUsuario'";	
		$resultado=mysql_query($sqlquery) or die("Fallo al buscar los datos del usuario. ".mysql_error());
		$arrayRes=mysql_fetch_assoc($resultado);
		return $arrayRes;
	}
}
?>