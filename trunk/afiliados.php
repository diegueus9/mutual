<?php
require("config.php");
class eAfiliados{
	public $strCodAfi="COD_AFILIADO";
	public $strCodMun="COD_MUN";
	public $strCodTipoIden="COD_TIPO_IDENTIFICACION2";
	public $strCodParentesco2="COD_PARENTESCO2";
	public $strCodTipoAfi2="COD_TIPO_AFILIADO2";
	public $strCodEntidadContratante2="COD_ENTIDAD_CONTRATANTE2";
	public $intTipoContrato="COD_TIPO_CONTRATO";
	public $strCodZona2="COD_ZONA2";
	public $strCodSexo="COD_SEXO2";
	public $strCodPertenenciaEtnica2="COD_PERTENENCIA_ETNICA2";
	public $strCodNivelSisben2="COD_NIVEL_SISBEN2";
	public $strTTI="TTI_COD_TIPO_IDENTIFICACION2";
	public $strCodGrupoPoblaciona="COD_GRUP_POBLACIONAL";
	public $strCodDep="COD_DEP";
	public $strTAFCodAfi="TAF_COD_AFILIADO";
	public $strCodEstadoAfiliacion2="COD_ESTADO_AFILIACION2";
	public $strCodArs="COD_ARS";
	public $strTipoIdentificacionCabezaFamilia="TIPO_IDENTIFICACION_CABEZA_FAMILIA";
	public $strNumeroIdentificacionCabezaFamilia="NUMERO_IDENTIFICACION_CABEZA_FAMILIA";
	public $strTipoIdentificacion="TIPO_IDENTIFICACION";
	public $strNumIdentificacion="NUMERO_IDENTIFICACION";
	public $strPrimerApellido="PRIMER_APELLIDO";
	public $strSegundoApellido="SEGUNDO_APELLIDO";
	public $strPrimerNombre="PRIMER_NOMBRE";
	public $strSegundoNombre="SEGUNDO_NOMBRE";
	public $dateFechaNacimiento="FECHA_NACIMIENTO";
	public $strSexo="SEXO";
	public $strTipoAfiliado="TIPO_AFILIADO";
	public $strParentescoCabezaFamilia="PARENTESCO_CABEZA_FAMILIA";
	public $strGrupoProfesiona="GRUPO_POBLACIONAL";
	public $intNivelSisben="NIVEL_SISBEN";
	public $strNumeroFichaSisbe="NUMERO_FICHA_SISBEN";
	public $strNucleoFamiliarSisben="NUCLEO_FAMILIAR_SISBEN";
	public $strCodDepm="COD_DEPARTAMENTO";
	public $strCodMunicipio="COD_MUNICIPIO";
	public $strZona="ZONA";
	public $dateFecAfiliacionSGSSS="FEC_AFILIACION_SGSSS";
	public $dateFecAfiliacionEntidadContratante="FEC_AFILIACION_ENTIDAD_CONTRATANTE";
	public $strNumContratoEnteTerritorial="NUM_CONTRATO_ENTE_TERRITORIAL";
	public $dateFecInicioContratoEnteTerritorial="FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL";
	public $strTipoContratoEnteTerritorial="TIPO_CONTRATO_ENTE_TERRITORIAL";
	public $strPertenenciaEtnica="PERTENENCIA_ETNICA";
	public $strEstadoAfiliacion="ESTADO_AFILIACION";
	public $strDireccion="DIRECCION";
	public $strTelefono="TELEFONO";
	public $strLocalidad="LOCALIDAD";
	public $dateFechaCarnetizacion="FECHA_CARNETIZACION";
	public $strBarrio="BARRIO";
	public $strCodIPS="COD_IPS";
	public $strCodContrato="COD_CONTRATO";	/*
	public $strCodAfiliado="COD_AFILIADO";
	public $strCodDane="COD_DANE";
	public $strCodTipoIdentificacion2="COD_TIPO_IDENTIFICACION2";
	public $strCodParentesco2="COD_PARENTESCO2";
	public $strCodTipoAfiliado2="COD_TIPO_AFILIADO2";
	public $strCodEntidadContratante2="COD_ENTIDAD_CONTRATANTE2";
	public $intCodTipoContrato="COD_TIPO_CONTRATO";
	public $strCodZona2="COD_ZONA2";
	public $strCodSexo="COD_SEXO2";
	public $strCodPertenenciaEtnica2="COD_PERTENENCIA_ETNICA2";
	public $strCodNivelSisben2="COD_NIVEL_SISBEN2";
	public $strTTICodTipoIdentificacion2="TTI_COD_TIPO_IDENTIFICACION2";
	public $strCodGrupoPoblacional="COD_GRUP_POBLACIONAL";
	public $strTAFCodAfiliado="TAF_COD_AFILIADO";
	public $strCodEstadoAfiliacion2="COD_ESTADO_AFILIACION2";
	public $strCodARS="COD_ARS";
	public $strTipoIdentificacionCabezaFamilia="TIPO_IDENTIFICACION_CABEZA_FAMILIA";
	public $strNumeroIdentificacionCabezaFamilia="NUMERO_IDENTIFICACION_CABEZA_FAMILIA";
	public $strTipoIdentificacion="TIPO_IDENTIFICACION";
	public $strNumeroIdentificacion="NUMERO_IDENTIFICACION";
	public $strPrimerApellido="PRIMER_APELLIDO";
	public $strSegundoApellido="SEGUNDO_APELLIDO";
	public $strPrimerNombre="PRIMER_NOMBRE";
	public $strSegundoNombre="SEGUNDO_NOMBRE";
	public $intEdad="EDAD";
	public $strSexo="SEXO";
	public $strTipoAfiliado="TIPO_AFILIADO";
	public $strParentescoCabezaFamilia="PARENTESCO_CABEZA_FAMILIA";
	public $strGrupoPoblacional="GRUPO_POBLACIONAL";
	public $intNivelSisben="NIVEL_SISBEN";
	public $strNumeroFichaSisben="NUMERO_FICHA_SISBEN";
	public $strNucleoFamiliarSisben="NUCLEO_FAMILIAR_SISBEN";
	public $strCodDepartamento="COD_DEPARTAMENTO";
	public $strCodMunicipio="COD_MUNICIPIO";
	public $strZona="ZONA";
	public $dateFecAfiliacionSGSSS="FEC_AFILIACION_SGSSS";
	public $dateFecAfiliacionEntidadContratante="FEC_AFILIACION_ENTIDAD_CONTRATANTE";
	public $strNumContratoEnteTerritorial="NUM_CONTRATO_ENTE_TERRITORIAL";
	public $dateFechaInicioContratoEnteTerritorial="FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL";
	public $strTipoContratoEnteTerritorial="TIPO_CONTRATO_ENTE_TERRITORIAL";
	public $strPertenenciaEtnica="PERTENENCIA_ETNICA";
	public $strEstadoAfiliacion="ESTADO_AFILIACION";
	public $strDireccion="DIRECCION";
	public $strTelefono="TELEFONO";
	public $strLocalidad="LOCALIDAD";
	public $dateFechaCarnetizacion="FECHA_CARNETIZACION";*/
	/**
	 * Esta funcion hace la conexión con la base de datos.
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
	 * Esta funcion se carga de insertar los datos que tiene actualmente el objeto en la taba de afiliados.
	 *
	 * @param Array $usuario
	 *//*
	public function insertar($usuario){
		global $TABLEAFILIADOS;
		$this->conectar();
		$variables=get_class_vars("eAfiliados");
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
		echo $querysql;
		//mysql_query($querysql) or die("Fallo al ejecutar el INSERT.<br/>". mysql_error());
	}
	private function cambiarEstadoAfiliacion($usuario, $desactivar=true){
		global $TABLEAFILIADOS,$IDENUNICO,$ESTADOAFILIACION;
		$this->conectar();
		if ($desactivar){
			$valor="su";
		}
		else {
			$valor="ac";
		}
		$sqlquery="UPDATE `$TABLEAFILIADOS` SET `$ESTADOAFILIACION` = '$valor' WHERE `$IDENUNICO` = '$usuario[$IDENUNICO]' ;";
		mysql_query($sqlquery) or die("Fallo al cambiar estado de afiliacion.".mysql_error());
	}
	function __destruct(){
		//mysql_close($this->myconn);
	}*/
}
?>