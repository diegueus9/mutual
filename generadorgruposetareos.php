<?php
require_once("config.php");
require_once("config_gruposetareos.php");
require_once("actualizador_edades.php");
require_once("generador_reportes.php");
class GeneradorGruposEtareos{
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	private $logGruposEtareos="Temp/logGruposEtareos.txt";
	private $logGruposEtareosPDF="Temp/logGruposEtareos";
	function __construct(){
		$act=new ActualizadorEdades();
		$act->actualizarEdades();
	}
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
	private function relacionaGruposAfiliados($codgrupo,$codAfiliado){
		global $TRELACIONAL;
		global $TABLAGRUPOSETAREOS,$ID;
		global $TABLEAFILIADOS,$IDENUNICO;
		
		while ($afi=mysql_fetch_assoc($codAfiliado)){
			$sqlquery="INSERT INTO `$TRELACIONAL` (`$IDENUNICO`,`$ID`) VALUES ('$afi[$IDENUNICO]','$codgrupo');";
			mysql_query($sqlquery) or die("Error al actualizar las relaciones entre afiliados y grupos etareos ".mysql_error());
		}
	}
	public function generarGruposEtareos(){
		$this->conectar();
		global $TABLAGRUPOSETAREOS,$VALMIN,$VALMAX,$FREC, $GEN,$EDAD,$SEXO, $ID;
		global $TABLEAFILIADOS,$IDENUNICO;
		global $TRELACIONAL;
		
		$sqlquery="TRUNCATE TABLE `$TRELACIONAL`";
		mysql_query($sqlquery) or die("Error al vaciar la tabla que relaciona los grupos etareos con los afiliados. ".mysql_error());
		
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
			$this->relacionaGruposAfiliados($filtro[$ID],$resultadoFiltrar);
			$sqlqueryInsertarFrecuencia="UPDATE `$TABLAGRUPOSETAREOS` SET `$FREC` = '$cantAfiliados' WHERE `$ID` = $filtro[$ID] ;";
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
			fwrite($buffer, $linea);
		}
		fclose($buffer) ;
	}
	public function generarReporteGruposPDF(){
		$gpdf=new GeneradorReportePDF();
		$gpdf->escribirdeArchivo($this->logGruposEtareosPDF,$this->logGruposEtareos,"Reporte de Grupos Etareos");
	}
	public function getGruposEtareos(){
		global $TABLAGRUPOSETAREOS,$FREC,$DESC;
		$arrayData=null;
		$cont=0;
		$this->conectar();
		$sqlqueryGruposEtareos="SELECT `$DESC`,`$FREC` FROM `$TABLAGRUPOSETAREOS` ;";
		$resultado=mysql_query($sqlqueryGruposEtareos) or die("Error al sacar los datos de la tabla de grupos etareos ".mysql_error());
		while ($registro=mysql_fetch_array($resultado)){
			/*$arrayData[$cont][$DESC]=$registro[$DESC];
			$arrayData[$cont][$FREC]=$registro[$FREC];*/
			$arrayData[$cont][$registro[$DESC]]=$registro[$FREC];
			$cont++;
		}
		return $arrayData;
	}
}
?>