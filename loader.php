<?php
require_once("confdatabase.php");
require("afiliados.php");
//require("arrayData.php");
require_once("config.php");

/**
 * Este archivo carga los datos del archivo de afiliados y hace las comparaciones con la base de datos.
 *
 */

class LoaderDB{
	/**
	 * Esta variable recibe un arreglo validado con los datos virtuales del archivo de contrato.
	 *
	 * @var Array
	 */
	private $arrArchivoVirtual;
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	/**
	 * El constructor de esta clase pide una matriz con los datos del contrato de afiliados.
	 *
	 * @param Array $arrArregloTexto
	 */
	function __construct($arrArregloTexto){
		// esta funcion recibe una matriz que se construye a partir de leer el archivo que envia la ARS
		$this->arrArchivoVirtual=$arrArregloTexto;
	}
	function __destruct(){
		mysql_close($this->myconn);
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
	/**
	 * Esta funcion carga el archivo virtual en la tabla temporal.
	 *
	 */
	private function CargarObjeto(){
		global $TABLETMP;
		$querysql="TRUNCATE TABLE `$TABLETMP` ";
		mysql_query($querysql,$this->myconn) or die("Fallo al vaciar la tabla temporal.<br/>". mysql_error());		
		$tafiliados=new tAfiliados();
		foreach ($this->arrArchivoVirtual as $registro  ){
			$querysql="INSERT INTO `$TABLETMP` ( ";
			foreach ($registro as $nombre => $valor ){
				$prop = new ReflectionProperty('tAfiliados', $nombre);
				$nombreCampo=$prop->getValue($tafiliados);
				$querysql.="`$nombreCampo`, ";
			}
			$querysql=substr($querysql,0,-2);
			$querysql.=") VALUES (";
			foreach ($registro as $nombre => $valor){
				$prop = new ReflectionProperty('tAfiliados', $nombre);
				$querysql.="'$valor', ";
			}
			$querysql=substr($querysql,0,-2);
			$querysql.=");";
			mysql_query($querysql,$this->myconn) or die("Fallo al ejecutar el INSERT.<br/>". mysql_error());
		}
	}
	/**
	 * Es la unica función publica, se encarga de grabar el arreglo de datos en la base de datos usando la tabla temporal.
	 *
	 */
	public function Load(){
		$this->conectar();
		$this->CargarObjeto();
	}
}


?>