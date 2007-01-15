<?php 
require("confdatabase.php");
require_once("miscellaneous.php");
require("validator.php");
class FileParser{
	
	//atributos que contienen la matriz de datos y la matriz de errores
	private $myArrayData = null;
	private $myArrayError = null;
	
	private $validador =null;
	
	private $conRegistrosValidos=0;
	private $conRegistrosInvalidos=0;
	
	
	function __construct(){
		$this->validador=new Validador();
	}

	public function loadFile($arrayFile){
	
		$strNombreArchivo = "TEMP.TXT";
		$strDirArchivo = $strProgramPath.'Temp/';
		
		if (!isset($arrayFile['tmp_name']) && !file_exists($arrayFile['tmp_name'])){
			echo "Error en el envio del archivo";
			exit;
		}		
		if (!@move_uploaded_file($arrayFile['tmp_name'], $strDirArchivo.$strNombreArchivo)){
			echo "Error al guardar archivo";
			exit;
		}
		
		if (file_exists($strDirArchivo.$strNombreArchivo))
			$arrayTextFile = file($strDirArchivo.$strNombreArchivo);

		$numRegistro = 0;		
		foreach ($arrayTextFile as $line){
			$arrayDataLine = split(",", $line);
			$numCampo = 0;
			//* OJO Modificar los indices con los del archivo de configuracion
			$arrayData[$numRegistro]["afi_strCodAfi"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodEntidadContratante2"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strTTI"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strNumeroIdentificacionCabezaFamilia"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodTipoIden"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strNumIdentificacion"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strPrimerApellido"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strSegundoApellido"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strPrimerNombre"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strSegundoNombre"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_intEdad"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strSexo"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodTipoAfi2"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodParentesco2"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodGrupoPoblacional"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodNivelSisben2"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strNumeroFichaSisben"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strNucleoFamiliarSisben"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodDepm"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strCodMunicipio"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strZona"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_dateFecAfiliacionSGSSS"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_dateFecAfiliacionEntidadContratante"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strNumContratoEnteTerritorial"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_dateFecInicioContratoEnteTerritorial"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strTipoContratoEnteTerritorial"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strPertenenciaEtnica"] = stripComillas($arrayDataLine[$numCampo++]);
			$arrayData[$numRegistro]["afi_strEstadoAfiliacion"] = stripComillas($arrayDataLine[$numCampo++]);		
			$numRegistro++;
		}
		
		$this->myArrayData = $this->checkData($arrayData);
	}
	private function esValidoRegistro($registro){
		if ($this->validador->esVAlidoRegistro($registro)){
			return true;
		}
		else {
			return false;
		}
	}
	private function checkData($arrayTest){
		$newArrayData=array();
		foreach ($arrayTest as $arrayReg){
			//revizar cada dato con su funcion correspondiente			
			if ($this->esValidoRegistro($arrayReg)){
				$newArrayData[$this->conRegistrosValidos]=$arrayReg;	
				$this->conRegistrosValidos++;			
			}
			else {
				$this->myArrayError[$this->conRegistrosInvalidos]=$arrayReg;
				$this->conRegistrosInvalidos++;
			}
			
		}
		return $newArrayData;
	
	}
	
	public function getCanRegistrosValidos(){
		return $this->conRegistrosValidos;
	}
	
	public function getCanRegistrosInvalidos(){
		return $this->conRegistrosInvalidos;
	}
		
	//* Devuelve la matriz propia con correcciones
	public function getArrayData (){	
		
		return $this->myArrayData;
			
	}
	//*/
	
	public function getArrayError () {
		
		return $this->myArrayError;
		
	}
}

?>