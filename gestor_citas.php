<?php
require_once("config.php");
require_once("config_servicios.php");
class GestorCitas{
	/**
	 * Esta variable representa la conexi{on con la base de datos.
	 *
	 * @var ResourceConnection
	 */
	private $myconn;
	/**
	 * Realiza la conexion a la base de datos.
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
	public function get
	public function getServicios(){
		global $TSERVICIO,$DESCSERVICIO,$CODSERVICIO;
		$cont=0;
		$this->conectar();
		$sqlquery="SELECT `$CODSERVICIO`,`$DESCSERVICIO` FROM `$TSERVICIO`;";
		$resultado=mysql_query($sqlquery) or die("Error al seleccionar los servicios programados ".mysql_error());
		while ($servicio=mysql_fetch_assoc($resultado)){
			$res[$cont]=$servicio;
			$cont++;
		}
		return $res;
	}
	public function getProfesionales(){
		global $TPROF,$NOMBRE,$CODPROFESIONAL;
		$cont=0;
		$this->conectar();
		$sqlquery="SELECT `$CODPROFESIONAL`,`$NOMBRE` FROM `$TPROF`;";
		$resultado=mysql_query($sqlquery) or die("Error al seleccionar los profesionales ".mysql_error());
		while ($profesional=mysql_fetch_assoc($resultado)){
			$res[$cont]=$profesional;
			$cont++;
		}
		return $res;
	}
	public function getProgramasPyP($codafiliado){
		global $IDENUNICO;
	}
}
?>