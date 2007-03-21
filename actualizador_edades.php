<?php
require_once("confdatabase.php");
require_once("config.php");

/**
 * Esta clase se encarga de Actualizar las edades de los afiliados al sistema de salud para poder
 * generar correctamente los grupos etareos.
 *
 */
class AgeUpdater{
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var 
	 */
	private $myconn;
	
	/**
	 * Esta funcion se encarga de hacer la conexión con la base de datos.
	 * Nota: En casi todo los objetos existe una funcion similar por lo que se debe cambiar
	 *
	 */
	private function conect(){
		global $HOST;
		global $BASEDEDATOS;
		global $USUARIO;
		global $PASS;
		$this->myconn = mysql_connect($HOST,$USUARIO,$PASS);
		if (! $this->myconn){
			echo "Error al intentar conectse con el servidor MySQL";
		exit(); 
		}

		if (! @mysql_select_db($BASEDEDATOS,$this->myconn)){
			echo "No se pudo conect correctamente con la Base de datos";
			exit();
		}
	
	}
	/**
	 * Esta funcion se encarge de calcular la edad de una persona de acuerdo a los parametros que 
	 * le pasen y a la fecha en la que sea ejecutada la función.
	 * @param int $int_userYear
	 * @param int $int_userMonth
	 * @param int $int_userDay
	 * @return unknown
	 */
	private function calculateAge($int_userYear,$int_userMonth,$int_userDay){
		$date_today=date("Y/m/d");
		list( $int_thisYear,$int_thisMonth,$int_thisDay ) = split('[/.-]', $date_today);
		$int_numYears=$int_thisYear-$int_userYear;
		if ($int_thisMonth<$int_userMonth){
			$int_numYears=$int_numYears-1;
			$int_numMonths=(12+$int_thisMonth)-$int_userMonth;
		}
		else {
			$int_numMonths=$int_thisMonth-$int_userMonth;
		}
		if ($int_thisDay<$int_userDay){
			$int_numMonths--;
		}
		$int_totalMonths=($int_numYears*12)+$int_numMonths;
		return $int_totalMonths;
	}
	/**
	 * Esta es la funcion publica que se debe llamar para que actualice las edades.
	 *
	 */
	public function ageToUpdate(){
		global $TABLEAFILIADOS,$IDENUNICO,$FECHANACIMIENTO,$EDAD;
		$this->conect();
		$sqlquery="SELECT `$IDENUNICO`,`$FECHANACIMIENTO` from `$TABLEAFILIADOS`;";
		$sqlr_result=mysql_query($sqlquery) or die("Error al sacar los datos de la tabla. ".mysql_error());
		while ($array_Registry = mysql_fetch_array($sqlr_result)){
			list( $int_year,$int_Month,$int_Day ) = split('[/.-]', $array_Registry[$FECHANACIMIENTO]);
			$int_age=$this->calculateAge($int_year,$int_Month,$int_Day);
			$sqlqueryinsert="UPDATE `$TABLEAFILIADOS` SET `$EDAD` = '$int_age' WHERE `$TABLEAFILIADOS`.`$IDENUNICO` = '$array_Registry[$IDENUNICO]' ;";
			mysql_query($sqlqueryinsert) or die("Error al actualizar las edades de los afiliados. ".mysql_error());
		}
		
	}
}
?>
