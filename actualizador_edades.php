<?php
require_once("confdatabase.php");
require_once("config.php");
class ActualizadorEdades{
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
	
	private function calcularEdad($a�oUsuario,$mesUsuario,$diaUsuario){
		$today=date("Y/m/d");
		list( $a�oActual,$mesActual,$diaActual ) = split('[/.-]', $today);
		$numA�os=$a�oActual-$a�oUsuario;
		if ($mesActual<$mesUsuario){
			$numA�os=$numA�os-1;
			$numMeses=(12+$mesActual)-$mesUsuario;
		}
		else {
			$numMeses=$mesActual-$mesUsuario;
		}
		if ($diaActual<$diaUsuario){
			$numMeses--;
		}
		$totalMeses=($numA�os*12)+$numMeses;
		return $totalMeses;
	}
	public function actualizarEdades(){
		global $TABLEAFILIADOS,$IDENUNICO,$FECHANACIMIENTO,$EDAD;
		$this->conectar();
		$sqlquery="SELECT `$IDENUNICO`,`$FECHANACIMIENTO` from `$TABLEAFILIADOS`;";
		$resultado=mysql_query($sqlquery) or die("Error al sacar los datos de la tabla. ".mysql_error());
		while ($registro = mysql_fetch_array($resultado)){
			list( $a�o,$mes,$dia ) = split('[/.-]', $registro[$FECHANACIMIENTO]);
			$edad=$this->calcularEdad($a�o,$mes,$dia);
			$sqlqueryinsert="UPDATE `$TABLEAFILIADOS` SET `EDAD` = '$edad' WHERE `$TABLEAFILIADOS`.`$IDENUNICO` = '$registro[$IDENUNICO]' ;";
			mysql_query($sqlqueryinsert) or die("Error al actualizar las edades de los afiliados. ".mysql_error());
		}
		
	}
}
$a = new ActualizadorEdades();
$a->actualizarEdades();
?>
