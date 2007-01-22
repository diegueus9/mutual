<?php
require("config.php");
require_once("confdatabase.php");
/**
 * Este objeto se encarga de hacer las comparaciones necesarias entre la tabla temporal y la de afiliados.
 *
 */
class Comparador{
	/**
	 * Esta variable representa la conexi{on con la base de datos.
	 *
	 * @var ResourceConnection
	 */
	private $myconn;
	private $logNuevosUsuarios="Temp/logNuevosUsuarios.txt";
	private $canNuevosUsuarios=0;
	private $logUsuariosSuspendidos="Temp/logUsuariosSuspendidos.txt";
	private $canUsuariosSuspendidos=0;
	private $canUsuariosActualizados=0;
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
	/**
	 * Esta funcion comprueba si la tabla de afiliados esta vacia
	 *
	 * @return bool
	 */
	private function tablaisempty(){
		global $TABLEAFILIADOS;
		$sqlquery="SELECT * from `$TABLEAFILIADOS`;";
		$result=mysql_query($sqlquery);
		$num_rows = mysql_num_rows($result);
		if ($num_rows==0){			
			return true;			
		}
		else {
			return false;
		}
	}
	/**
	 * Esta funcion se encarga de cargar los datos de la tabla temporal.
	 * 
	 * @return unknown
	 */
	private function cargarDatos($fTmp=true){
		global $TABLETMP,$TABLEAFILIADOS;
		if ($fTmp){
			$sqlquery="SELECT * FROM `$TABLETMP`; ";
		}
		else {
			$sqlquery="SELECT * FROM `$TABLEAFILIADOS`; ";
		}
		$resultado=mysql_query($sqlquery) or die("Error al sacar los datos de la tabla. ".mysql_error());
		return $resultado;
	}
	/**
	 * Esta funcion se encarga de insertar un nuevo afiliado.
	 *
	 * @param $Array $usuario
	 */
	private function insertarNuevoUsuario($usuario){
		global $TABLEAFILIADOS;
		$variables=get_class_vars("tAfiliados");
		$querysql="INSERT INTO `$TABLEAFILIADOS` (";
		foreach ($variables as $campo){
			$querysql.="`$campo`, ";
		}
		$querysql=substr($querysql,0,-2);
		$querysql.=") VALUES ( ";
		foreach ($variables as $campo){
			$querysql.="'$usuario[$campo]', ";
		}
		$querysql=substr($querysql,0,-2);
		$querysql.=");";
		mysql_query($querysql) or die("Fallo al ejecutar el INSERT.<br/>". mysql_error());
		$this->escribirLogNuevoUsuario($usuario);
	}
	private function suspenderUsuario($usuario){
		global $TABLEAFILIADOS,$IDENUNICO,$ESTADOAFILIACION;
		$sqlquery="UPDATE `$TABLEAFILIADOS` SET `$ESTADOAFILIACION` = 'su' WHERE `$IDENUNICO` = '$usuario[$IDENUNICO]' ;";
		mysql_query($sqlquery) or die("Fallo al cambiar estado de afiliacion.".mysql_error());
		$this->escribirLogUsuarioSuspendido($usuario);
	}
	private function escribirLogNuevoUsuario($registro){
		$con=true;
		$le = fopen($this->logNuevosUsuarios, "a");
		$linea="";
		foreach ($registro as $campo){
			if ($con){
				$linea.='"'.strval($campo).'",';
				$con=false;
			}
			else {
				$con=true;
			}
		}
		$linea.="\n";
		fwrite($le, $linea);
		fclose($le) ;
		$this->canNuevosUsuarios++;
	}
	private function escribirLogUsuarioSuspendido($registro){
		$con=true;
		$le = fopen($this->logUsuariosSuspendidos, "a");
		$linea="";
		foreach ($registro as $campo){
			if ($con){
				$linea.='"'.strval($campo).'",';
				$con=false;
			}
			else {
				$con=true;
			}
		}
		$linea.="\n";
		fwrite($le, $linea);
		fclose($le) ;
		$this->canUsuariosSuspendidos++;
	}
	/**
	 * Revisa si un usuario ya esta en la tabla de afiliados caso en el cual se deberia hacer una actualización.
	 *
	 * @param Array $arregloUsuario
	 * @return bool
	 */
	private function estaAfiliadoya($arregloUsuario){
		global $TABLEAFILIADOS,$TABLETMP,$IDENUNICO;
		//print_r($arregloUsuario);
		$sqlquery="SELECT *  FROM `$TABLEAFILIADOS` WHERE `$IDENUNICO` LIKE  '$arregloUsuario[0]' ;";
		$resultado=mysql_query($sqlquery) or die("No pudo realizar la consulta de revisar si el usuario ya esta");
		$num_rows=mysql_num_rows($resultado);
		if ($num_rows==0){
			return false;
		}
		elseif ($num_rows>1){
			//echo "Existe mas de una coincidencia en la busqueda!!!.";
			return false;
		}
		else{
			return true;
		}
	}
	private function estaReportado($arregloUsuario){
		global $TABLEAFILIADOS,$TABLETMP,$IDENUNICO;
		//print_r($arregloUsuario);
		$sqlquery="SELECT *  FROM `$TABLETMP` WHERE `$IDENUNICO` LIKE  '$arregloUsuario[0]' ;";
		$resultado=mysql_query($sqlquery) or die("No pudo realizar la consulta de revisar si el usuario fue reportado.");
		$num_rows=mysql_num_rows($resultado);
		if ($num_rows==0){
			return false;
		}
		elseif ($num_rows>1){
			//echo "Existe mas de una coincidencia en la busqueda!!!.";
			return false;
		}
		else{
			return true;
		}
	}
	/**
	 * Este es el algotimo de comparacion que contiene el o los criterios para ver si un afiliado esta o no esta en la tabla.
	 *
	 */
	private function ejecutarAlgoritmoInsercion(){
		$resultado=$this->cargarDatos();
		while ($usuario=mysql_fetch_array($resultado)) {
			if ($this->estaAfiliadoya($usuario)){
				//echo "";			
			}
			else {
				$this->insertarNuevoUsuario($usuario);
			}
		}
	}
	private function ejecutarAlgoritmoSuspencion(){
		$resultado=$this->cargarDatos(false);
		while ($usuario=mysql_fetch_array($resultado)) {
			if ($this->estaReportado($usuario)){
				echo "";			
				//echo "El afiliado fue reportado.<br/>";			
			}
			else {
				echo "";
				//echo "suspendiendo...<br/>";
				$this->suspenderUsuario($usuario);
			}
		}
	}
	/**
	 * Función principal y unica publica que ejecuta todas las funciones de este objeto necesarias para el proceso de comparación.
	 *
	 */
	public function ejecutarProcedimiento(){
		global $TABLEAFILIADOS,$TABLETMP;
		$this->conectar();
		if ($this->tablaisempty()){
			$sqlquery="INSERT INTO `$TABLEAFILIADOS` SELECT * FROM `$TABLETMP` ;";
			mysql_query($sqlquery) or die("No pudo copiar la tabla temporal a la de afiliados".mysql_error());
			$sqlquery2="SELECT * FROM `$TABLEAFILIADOS`;";
			$resultado=mysql_query($sqlquery2) or die(mysql_error());
			$num_rows=mysql_num_rows($resultado);
			$this->canNuevosUsuarios=$num_rows;
		}
		else {
			$this->ejecutarAlgoritmoInsercion();
			$this->ejecutarAlgoritmoSuspencion();
		}
	}
	public function getCantidadUsuariosNuevos(){
		return $this->canNuevosUsuarios;
	}
	public function getCantidadUsuariosSuspendidos(){
		return $this->canUsuariosSuspendidos;	
	}
	public function getCantidadUsuariosActualizados(){
		return $this->canUsuariosActualizados;
	}
}
?>