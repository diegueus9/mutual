<?php
require("config.php");
require_once("confdatabase.php");
require_once("generador_reportes.php");
/**
 * Este objeto se encarga de hacer las comparaciones necesarias entre la tabla temporal y la de afiliados.
 *
 */
class Comparator{
	/**
	 * Esta variable representa la conexi{on con la base de datos.
	 *
	 * @var ResourceConnection
	 */
	private $myconn;
	/**
	 * Nombre del Archivo donde se guardará el registro de los nuevos usuarios.
	 *
	 * @var unknown_type
	 */
	private $file_logNewUsers="Temp/logNuevosUsuarios.txt";
	/**
	 * Nombre del archivo del Reporte en pdf de los nuevos usuarios.
	 *
	 * @var unknown_type
	 */
	private $file_logNewUsersPDF="Temp/logNuevosUsuarios";
	private $int_numNewUsers=0;
	private $file_SuspendedUsers="Temp/logUsuariosSuspendidos.txt";
	private $int_numSuspendedUsers=0;
	private $int_numUpdatedUsers=0;
	/**
	 * Realiza la conexion a la base de datos.
	 *
	 */
	private function conect(){
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
	private function tableIsEmpty(){
		global $TABLEAFILIADOS;
		$sqlquery="SELECT * from `$TABLEAFILIADOS`;";
		$result=mysql_query($sqlquery);
		$int_numRows = mysql_num_rows($result);
		if ($int_numRows==0){			
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
	private function loadData($f_bool_Tmp=true){
		global $TABLETMP,$TABLEAFILIADOS;
		if ($f_bool_Tmp){
			$sqlquery="SELECT * FROM `$TABLETMP`; ";
		}
		else {
			$sqlquery="SELECT * FROM `$TABLEAFILIADOS`; ";
		}
		$sqlr_result=mysql_query($sqlquery) or die("Error al sacar los datos de la tabla. ".mysql_error());
		return $sqlr_result;
	}
	/**
	 * Esta funcion se encarga de insertar un nuevo afiliado.
	 *
	 * @param $Array $array_User
	 */
	private function insertNewUser($array_User){
		global $TABLEAFILIADOS;
		$variables=get_class_vars("tAfiliados");
		$querysql="INSERT INTO `$TABLEAFILIADOS` (";
		foreach ($variables as $field){
			$querysql.="`$field`, ";
		}
		$querysql=substr($querysql,0,-2);
		$querysql.=") VALUES ( ";
		foreach ($variables as $field){
			$querysql.="'$array_User[$field]', ";
		}
		$querysql=substr($querysql,0,-2);
		$querysql.=");";
		mysql_query($querysql) or die("Fallo al ejecutar el INSERT.<br/>". mysql_error());
		$this->writeLogNewUser($array_User);
	}
	private function suspendUser($array_User){
		global $TABLEAFILIADOS,$IDENUNICO,$ESTADOAFILIACION;
		$sqlquery="UPDATE `$TABLEAFILIADOS` SET `$ESTADOAFILIACION` = 'su' WHERE `$IDENUNICO` = '$array_User[$IDENUNICO]' ;";
		mysql_query($sqlquery) or die("Fallo al cambiar estado de afiliacion.".mysql_error());
		$this->writeLogSuspendedUser($array_User);
	}
	private function writeLogNewUser($array_Registry){
		$bool_con=true;
		$file_log = fopen($this->file_logNewUsers, "a");
		$str_Line="";
		foreach ($array_Registry as $field){
			if ($bool_con){
				$str_Line.='"'.strval($field).'",';
				$bool_con=false;
			}
			else {
				$bool_con=true;
			}
		}
		$str_Line.="\n";
		fwrite($file_log, $str_Line);
		fclose($file_log) ;
		$this->int_numNewUsers++;
	}
	private function writeLogSuspendedUser($array_Registry){
		$bool_con=true;
		$file_log = fopen($this->file_SuspendedUsers, "a");
		$str_Line="";
		foreach ($array_Registry as $field){
			if ($bool_con){
				$str_Line.='"'.strval($field).'",';
				$bool_con=false;
			}
			else {
				$bool_con=true;
			}
		}
		$str_Line.="\n";
		fwrite($file_log, $str_Line);
		fclose($file_log) ;
		$this->int_numSuspendedUsers++;
	}
	/**
	 * Revisa si un usuario ya esta en la tabla de afiliados caso en el cual se deberia hacer una actualización.
	 *
	 * @param Array $array_User
	 * @return bool
	 */
	private function isAffiliated($array_User){
		global $TABLEAFILIADOS,$TABLETMP,$IDENUNICO;
		//print_r($array_User);
		$sqlquery="SELECT *  FROM `$TABLEAFILIADOS` WHERE `$IDENUNICO` LIKE  '$array_User[0]' ;";
		$sqlr_result=mysql_query($sqlquery) or die("No pudo realizar la consulta de revisar si el usuario ya esta");
		$int_numRows=mysql_num_rows($sqlr_result);
		if ($int_numRows==0){
			return false;
		}
		elseif ($int_numRows>1){
			//echo "Existe mas de una coincidencia en la busqueda!!!.";
			return false;
		}
		else{
			return true;
		}
	}
	private function isReported($array_User){
		global $TABLEAFILIADOS,$TABLETMP,$IDENUNICO;
		//print_r($array_User);
		$sqlquery="SELECT *  FROM `$TABLETMP` WHERE `$IDENUNICO` LIKE  '$array_User[0]' ;";
		$sqlr_result=mysql_query($sqlquery) or die("No pudo realizar la consulta de revisar si el usuario fue reportado.");
		$int_numRows=mysql_num_rows($sqlr_result);
		if ($int_numRows==0){
			return false;
		}
		elseif ($int_numRows>1){
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
	private function execInsertionAlgoritm(){
		$sqlr_result=$this->loadData();
		while ($array_User=mysql_fetch_array($sqlr_result)) {
			if ($this->isAffiliated($array_User)){
				//echo "";			
			}
			else {
				$this->insertNewUser($array_User);
			}
		}
	}
	private function execSuspentionAlgoritm(){
		$sqlr_result=$this->loadData(false);
		while ($array_User=mysql_fetch_array($sqlr_result)) {
			if ($this->isReported($array_User)){
				echo "";			
				//echo "El afiliado fue reportado.<br/>";			
			}
			else {
				echo "";
				//echo "suspendiendo...<br/>";
				$this->suspendUser($array_User);
			}
		}
	}
	/**
	 * Función principal y unica publica que ejecuta todas las funciones de este objeto necesarias para el proceso de comparación.
	 *
	 */
	public function ejecutarProcedimiento(){
		global $TABLEAFILIADOS,$TABLETMP;
		$this->conect();
		if ($this->tableIsEmpty()){
			$sqlquery="INSERT INTO `$TABLEAFILIADOS` SELECT * FROM `$TABLETMP` ;";
			mysql_query($sqlquery) or die("No pudo copiar la tabla temporal a la de afiliados".mysql_error());
			$sqlquery2="SELECT * FROM `$TABLEAFILIADOS`;";
			$sqlr_result=mysql_query($sqlquery2) or die(mysql_error());
			$int_numRows=mysql_num_rows($sqlr_result);
			while ($res=mysql_fetch_assoc($sqlr_result)){
				$this->writeLogNewUser($res);
			}
			$this->int_numNewUsers=$int_numRows;
		}
		else {
			$this->execInsertionAlgoritm();
			$this->execSuspentionAlgoritm();
		}
		$this->generateReportPDF();
	}
	public function getNumNewUseres(){
		return $this->int_numNewUsers;
	}
	public function getNumSuspendedUseres(){
		return $this->int_numSuspendedUsers;	
	}
	public function getNumUpdatedUseres(){
		return $this->int_numUpdatedUsers;
	}
	public function generateReportPDF(){
		$gPDF=new GeneradorReportePDF();
		$gPDF->escribirdeArchivo($this->file_logNewUsersPDF,$this->file_logNewUsers,"Reporte de Usuarios Nuevos");
	}
}
?>