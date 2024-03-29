<?php
require_once("config.php");
require_once("config_servicios.php");
class ProgramadorServicios{
	/**
	 * Esta variable representa la conexi�n con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	
	/**
	 * Esta funcion se encarga de hacer la conexi�n con la base de datos.
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
	public function getUnidadAtencion(){
		global $TUA,$DESCCONS,$CODCONS; 
		$cont=0;
		$this->conectar();
		$sqlquery="SELECT `$CODCONS`,`$DESCCONS` FROM `$TUA`;";
		$resultado=mysql_query($sqlquery) or die("Error al seleccionar las unidades de atencion ".mysql_error());
		while ($unaten=mysql_fetch_assoc($resultado)){
			$res[$cont]=$unaten;
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
	public function agregarDatos($servicio,$unidadatencion,$profesional,$fechatencion,$horainicio,$horafin){
		global $TPROF;
		global $TSERVICIO,$CODSERVICIO,$CODPROFESIONAL;	
		global $TRABAJAN,$CODPROFESIONAL,$CODCONS;
		global $TAGENDA,$DIA,$HINICIO,$HFIN;
		$this->conectar();
		$codprof=intval($profesional);
		$codser=intval($servicio);
		$sqlquery="UPDATE `$TPROF` SET `$CODSERVICIO` = $codser WHERE `$CODPROFESIONAL` = $codprof;";
		mysql_query($sqlquery) or die("Error al actualizar la tabla ".$TSERVICIO." ".mysql_error());
		$sqlquery="INSERT INTO `$TRABAJAN` (`$CODPROFESIONAL`,`$CODCONS`) VALUES ($codprof,$unidadatencion);";
		mysql_query($sqlquery) /*or die("Error al relacionar a los profesionales con los consultorios ".mysql_error())*/;
		$sqlquery="INSERT INTO $TAGENDA (`$CODPROFESIONAL`,`$DIA`,`$HINICIO`,`$HFIN`) VALUES ($codprof,'$fechatencion','$horainicio','$horafin') ;";
		echo $sqlquery;
		mysql_query($sqlquery) or die("Error al ingresar datos a la agenda ".mysql_error());
		
	}
}
?>
