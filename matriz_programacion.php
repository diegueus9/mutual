<?php
require_once("config.php");
require_once("config_servicios.php");
class MatrizProgramacion{
	private $matriz;
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
	private function actualizarMatriz(){
		global $TUA,$CODCONS,$DESCCONS;
		global $TPROF,$NOMBRE,$CODPROF;
		global $TRABAJAN;
		global $TAGENDA,$DIA,$HINICIO,$HFIN;
		$this->conectar();
		$sqlquery="SELECT `$DIA` , `$HINICIO` , `$HFIN` , `$NOMBRE` , `$DESCCONS` FROM `$TAGENDA` INNER JOIN ( `$TPROF` INNER JOIN ( `$TRABAJAN` INNER JOIN `$TUA` ON `$TRABAJAN`.`$CODCONS` = `$TUA`.`$CODCONS` ) ON `$TPROF`.`$CODPROF` = `$TRABAJAN`.`$CODPROF` ) ON `$TAGENDA`.`$CODPROF` = `$TPROF`.`$CODPROF` ;";
		$resultado=mysql_query($sqlquery) or die ("Error al sacar la matriz de programacion de la base de datos ".mysql_error());
		while ($reg=mysql_fetch_assoc($resultado)){
			$this->matriz[$reg[$DIA]][$reg[$DESCCONS]]=Array($NOMBRE => $reg[$NOMBRE],$HINICIO=>$reg[$HINICIO],$HFIN=>$reg[$HFIN]);
		}
		
	}
	public function getMatriz(){
		$this->actualizarMatriz();
		return $this->matriz;
	}
}
?>