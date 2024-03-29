<?php
require_once("config.php");
require_once("config_servicios.php");
require_once("config_generadormetas.php");
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
	//public function get
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
		$sqlquery="SELECT COD_AFILIADO,NOMBRE_PROGRAMA, DETALLE_PROGRAMA, DESCRIPCION_CUPS
		FROM TAFILIADOS
		INNER JOIN TACTIVIDAD_PROGRAMAR ON TAFILIADOS.COD_AFILIADO = TACTIVIDAD_PROGRAMAR.COD_AFILIADO
		INNER JOIN TPROGRAMAS ON TACTIVIDAD_PROGRAMAR.COD_PROGRAMA = TPROGRAMAS.COD_PROGRAMA
		INNER JOIN TCUPS ON TACTIVIDAD_PROGRAMAR.COD_CUPS = TCUPS.COD_CUPS
		WHERE TAFILIADOS.COD_AFILIADO = $codafiliado ; ";
		$this->conectar();
		
		$resultado=mysql_query($sqlquery) or die(mysql_error());
		while ($res=mysql_fetch_assoc($resultado)){
			print_r($res);
		}
	}
}
$a=new GestorCitas();
print_r($a->getProgramasPyP("3238099"));
?>