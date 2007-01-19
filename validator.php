<?php
require_once("miscellaneous.php");
class Validador{
	//arreglos con los parametros de la norma 195 (Ver Glosario campo 'n' = VG c'n')
	private $myArrayDocType = array("MS","RC","TI","CC","CE","PA","AS"); // VG c1
	private $myArraySexType = array("M","F"); //VG c7
	private $myArrayAfilType = array("F","O"); //VG c10
	private $myArrayParentType = array("1","2","9"); //VG c11
	private $myArraySisLev = array("1","2","3","4","N"); //VG c16
	private $myArrayZone = array("U","R");
	private $myArrayContType = array("CO","AM","CN","SP","OT");
	private $myArrayAfilState = array("AC","SU");
	private $logRegistrosInvalidos="Temp/logRegistrosInvalidos.txt";
	private function escribirRegistroInvalido($registro,$motivo){
		$le = fopen($this->logRegistrosInvalidos, "a");
		$linea="";
		foreach ($registro as $campo){
			$linea.='"'.strval($campo).'",';
		}
		$linea.='"'.strval($motivo).'"'."\n";
		fwrite($le, $linea);
		fclose($le) ;
	}
	
	private function esValidoCodAfiliacion($registro){
		if ($this->checkNumData($registro["afi_strCodAfi"],13)!=0){
			$this->escribirRegistroInvalido($registro,"Codigo de Afiliado");
			return false;			
		}
		else {
			return true;
		}
	}
	//Esta funcion valida los Tipos de Identificacion dependiendo de quien sean
	// es el valor de $persona
	// 0 Cabeza de Familia 
	// 1 Afiliado
	private function esValidoTipodeIdentificacion($registro,$persona){
		if ($persona ==0 ){
			if ($this->checkParamType($registro["afi_strTTI"],$this->myArrayDocType)!=0){
				$this->escribirRegistroInvalido($registro,"Tipo de Documento de Cabeza de Familia");
				return false;			
			}
			else {
				return true;
			}
		}
		elseif ($persona==1){
			if ($this->checkParamType($registro["afi_strCodTipoIden"],$this->myArrayDocType)!=0){
				$this->escribirRegistroInvalido($registro,"Tipo de Documento");
				return false;			
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}
	}
	private function esValidoNumeroIdentificacion($registro,$persona=0){
		if ($persona ==0 ){
			if ($this->checkNumData($registro["afi_strNumeroIdentificacionCabezaFamilia"],16)!=0){
				$this->escribirRegistroInvalido($registro,"Numero de Documento de Cabeza de Familia");
				return false;			
			}
			else {
				return true;
			}
		}
		elseif ($persona==1){
			if ($this->checkNumData($registro["afi_strCodTipoIden"],16)!=0){
				$this->escribirRegistroInvalido($registro,"Tipo de Documento");
				return false;			
			}
			else {
				return true;
			}
		}
		else {
			return true;
		}
	}
	private function esValidoNombre($registro){
		$esValido=true;
		if ($this->checkStringData($registro["afi_strPrimerApellido"],20)!=0){
			$this->escribirRegistroInvalido($registro,"Primer Apellido");
			$esValido=false;
		}
		elseif ($this->checkStringData($registro["afi_strSegundoApellido"],20)!=0){
			$this->escribirRegistroInvalido($registro,"Segundo Apellido");
			$esValido=false;
		}
		elseif ($this->checkStringData($registro["afi_strPrimerNombre"],20)!=0){
			$this->escribirRegistroInvalido($registro,"Primer Nombre");
			$esValido=false;
		}
		elseif ($this->checkStringData($registro["afi_strSegundoNombre"],20)!=0){
			$this->escribirRegistroInvalido($registro,"Segundo Nombre");
			$esValido=false;
		}
		return $esValido;
	}
	private function esValidoEdad($registro){
		 
		if (esFechaValida($registro["afi_dateFechaNacimiento"])){
			return true;
		}
		else {
			$this->escribirRegistroInvalido($registro,"Fecha de Nacimiento");
			return false;
		}
	}
	private function esValidoSexo($registro){
		if ($this->checkParamType($registro["afi_strSexo"],$this->myArraySexType)!=0){
			$this->escribirRegistroInvalido($registro,"Sexo");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoTipoAfiliado($registro){
		if ($this->checkParamType($registro["afi_strCodTipoAfi2"],$this->myArrayAfilType)!=0){
			$this->escribirRegistroInvalido($registro,"Codigo de tipo de afiliado");
			return false;
		}
		return true;
	}
	private function esValidoCodParentesco($registro){
		if ($this->checkParamType($registro["afi_strCodParentesco2"],$this->myArrayParentType)!=0){
			$this->escribirRegistroInvalido($registro,"Tipo de Parentesco");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoNivelSisben($registro){
		if ($this->checkParamType($registro["afi_strCodNivelSisben2"],$this->myArraySisLev)!=0){
			$this->escribirRegistroInvalido($registro,"Nivel de Sisben");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoNumeroFicha($registro){
		if ($this->checkNumData($registro["afi_strNumeroFichaSisben"],13)!=0){
			$this->escribirRegistroInvalido($registro,"Numero de Ficha de Sisbem");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoZona($registro){
		if ($this->checkParamType($registro["afi_strZona"],$this->myArrayZone)!=0){
			$this->escribirRegistroInvalido($registro,"Codigo de Zona");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoFechaAfiliacionSGSSS($registro){
		if (!(esFechaValida($registro["afi_dateFecAfiliacionSGSSS"]))){
			$this->escribirRegistroInvalido($registro,"Fecha afiliacion a SGSSS");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoFechaAfiliacionEntidadContratante($registro){
		if (!(esFechaValida($registro["afi_dateFecAfiliacionEntidadContratante"]))){
			$this->escribirRegistroInvalido($registro,"Fecha de afiliacion a entidad contratante");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoNumeroContratoET($registro){
		if ($this->checkNumData($registro["afi_strNumContratoEnteTerritorial"],10)!=0){
			$this->escribirRegistroInvalido($registro,"Numero de Contrato con el Ente Territorial");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoFechaInicioContratoET($registro){
		if (!(esFechaValida($registro["afi_dateFecInicioContratoEnteTerritorial"]))){
			$this->escribirRegistroInvalido($registro,"Fecha de inicio de contrato con el ente territorial");
			return false;
		}
		else {
			return true;
		}
	}
	private function esValidoTipoContratoET($registro){
		if ($this->checkParamType($registro["afi_strTipoContratoEnteTerritorial"],$this->myArrayContType)!=0){
			$this->escribirRegistroInvalido($registro,"Tipo de Contrato con el Ente Territorial");
			return false;
		}
		else {
			return true;
		}
	}
	public function esValidoRegistro($registro){
		if (!($this->esValidoCodAfiliacion($registro))){
			return false;			
		}
		elseif (!($this->esValidoTipodeIdentificacion($registro,0))){
			return false;
		}
		elseif (!($this->esValidoNumeroIdentificacion($registro,0))){
			return false;
		}
		elseif (!($this->esValidoTipodeIdentificacion($registro,1))){
			return false;
		}
		elseif (!($this->esValidoNombre($registro))){
			return false;
		}
		elseif (!($this->esValidoEdad($registro))){
			return false;
		}
		elseif (!($this->esValidoSexo($registro))){
			return false;
		}
		elseif (!($this->esValidoTipoAfiliado($registro))){
			return false; 
		}
		elseif (!($this->esValidoCodParentesco($registro))){
			return false; 
		}
		elseif (!($this->esValidoNivelSisben($registro))){
			return false; 
		}
		elseif (!($this->esValidoNumeroFicha($registro))){
			return false; 
		}
		elseif (!($this->esValidoZona($registro))){
			return false;
		}
		elseif (!($this->esValidoFechaAfiliacionSGSSS($registro))){
			return false;
		}
		elseif (!($this->esValidoFechaAfiliacionEntidadContratante($registro))){
			return false;
		}
		elseif (!($this->esValidoNumeroContratoET($registro))){
			return false;
		}
		elseif (!($this->esValidoFechaInicioContratoET($registro))){
			return false;
		}
		elseif (!($this->esValidoTipoContratoET($registro))){
			return false;
		}
		else {
			return true;
		}
	}
	// Reviza la integridad de datos numericos, como su longitud
	// retorna 0 si es adecuado
	// retorna 1 si contiene caracteres extraños (alfabeticos, de puntiacion, espacios, etc)
	// retorna 2 si su longitud es mayor a la especificada (parametro $numLen)
	private function checkNumData($varNumData, $numLen){
		
		if (eregi("[^0-9]",$varNumData)) {
			return 1;
		}
		
		if($numLen < strlen($varNumData)){
			return 2;			
		}
		
		return 0;
	}
	

	// Reviza la integridad de datos alfabeticos, como su longitud
	// retorna 0 si es adecuado
	// retorna 1 si contiene caracteres extraños
	// retorna 2 si su longitud es mayor a la especificada	
	private function checkStringData($varStrData, $numLen){
		if (ereg("[^A-Z]",$varStrData)) {
			return 1;
		}
		
		if($numLen < strlen($varStrData)){
			return 2;			
		}
		
		return 0;
	}
	
	// Reviza la integridad de datos parametricos (ej Tipo Documentos)
	// el parametro $arrayNorm se refiere a los parametros correspondientes
	// al campo evalado.
	// retorna 0 si es adecuado
	// retorna 1 si no pertenece a la norma
	
	private function checkParamType($varParmData, $arrayNorm){
		
		
		if (in_array($varParmData, $arrayNorm)) {
			return 0;
		}
		
		return 1;
	}
}