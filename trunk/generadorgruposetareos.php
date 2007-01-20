<?php
require_once("config.php");
require_once("config_gruposetareos.php");
class GeneradorGruposEtareos{
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	private $logGruposEtareos="Temp/logGruposEtareos.txt";
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
	public function generarGruposEtareos(){
		$this->conectar();
		global $TABLAGRUPOSETAREOS,$VALMIN,$VALMAX,$FREC, $GEN,$EDAD,$SEXO, $ID;
		global $TABLEAFILIADOS,$IDENUNICO;
		$sqlqueryGruposEtareos="SELECT `$ID`,`$VALMIN`,`$VALMAX`,`$GEN` FROM `$TABLAGRUPOSETAREOS` ;";
		$resultado=mysql_query($sqlqueryGruposEtareos) or die(" Error al sacar las reglas de los grupos etareos ".mysql_error());
		while ($filtro = mysql_fetch_array ($resultado)){
			$sqlqueryPersonasEntranFiltro="select `$IDENUNICO` from `$TABLEAFILIADOS` where `$EDAD`<=  $filtro[$VALMAX] AND `$EDAD` >= $filtro[$VALMIN] ";
			if ($filtro[$GEN]=='F' or $filtro[$GEN]=='M'){
				$sqlqueryPersonasEntranFiltro=$sqlqueryPersonasEntranFiltro." AND `$SEXO`= '$filtro[$GEN]' ";
			}
			$sqlqueryPersonasEntranFiltro=$sqlqueryPersonasEntranFiltro." ; ";
			$resultadoFiltrar=mysql_query($sqlqueryPersonasEntranFiltro) or die("Error al buscar cuantas personas entran en el filtro ".mysql_error());
			$cantAfiliados=mysql_num_rows($resultadoFiltrar);
			$sqlqueryInsertarFrecuencia="UPDATE `$TABLAGRUPOSETAREOS` SET `$FREC` = '$cantAfiliados' WHERE `$ID` = $filtro[$ID] ;";
			echo $sqlqueryInsertarFrecuencia;
			mysql_query("$sqlqueryInsertarFrecuencia") or die("Error al actualizar las frecuencias de los grupos etareos en la tabla ".mysql_error());
		}
	}
	public function generarReporteGrupos(){
		$this->conectar();
		global $TABLAGRUPOSETAREOS,$FREC,$DESC;
		$sqlqueryGruposEtareos="SELECT `$DESC`,`$FREC` FROM `$TABLAGRUPOSETAREOS` ;";
		$resultado=mysql_query($sqlqueryGruposEtareos) or die("Error al sacar los datos de la tabla de grupos etareos ".mysql_error());
		$buffer = fopen($this->logGruposEtareos, "w");
		while ($registro=mysql_fetch_array($resultado)){
			$linea=$registro[$DESC].",";
			$linea=$linea.$registro[$FREC]."\n";
			echo $linea;
			fwrite($buffer, $linea);
		}
		fclose($buffer) ;
	}
}
?>