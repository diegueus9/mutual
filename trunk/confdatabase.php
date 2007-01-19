<?php
/**
 * Clase que guarda la configuracion de la tabla que se este usando para almacenar los datos de los
 * afiliados.
 *
 */
class tAfiliados{
	public $afi_strCodAfi="COD_AFILIADO";
	public $afi_strCodMun="COD_MUN";
	public $afi_strCodTipoIden="COD_TIPO_IDENTIFICACION2";
	public $afi_strCodParentesco2="COD_PARENTESCO2";
	public $afi_strCodTipoAfi2="COD_TIPO_AFILIADO2";
	public $afi_strCodEntidadContratante2="COD_ENTIDAD_CONTRATANTE2";
	public $afi_intTipoContrato="COD_TIPO_CONTRATO";
	public $afi_strCodZona2="COD_ZONA2";
	public $afi_strCodSexo="COD_SEXO2";
	public $afi_strCodPertenenciaEtnica2="COD_PERTENENCIA_ETNICA2";
	public $afi_strCodNivelSisben2="COD_NIVEL_SISBEN2";
	public $afi_strTTI="TTI_COD_TIPO_IDENTIFICACION2";
	public $afi_strCodGrupoPoblacional="COD_GRUP_POBLACIONAL";
	public $afi_strCodDep="COD_DEP";
	public $afi_strTAFCodAfi="TAF_COD_AFILIADO";
	public $afi_strCodEstadoAfiliacion2="COD_ESTADO_AFILIACION2";
	public $afi_strCodArs="COD_ARS";
	public $afi_strTipoIdentificacionCabezaFamilia="TIPO_IDENTIFICACION_CABEZA_FAMILIA";
	public $afi_strNumeroIdentificacionCabezaFamilia="NUMERO_IDENTIFICACION_CABEZA_FAMILIA";
	public $afi_strTipoIdentificacion="TIPO_IDENTIFICACION";
	public $afi_strNumIdentificacion="NUMERO_IDENTIFICACION";
	public $afi_strPrimerApellido="PRIMER_APELLIDO";
	public $afi_strSegundoApellido="SEGUNDO_APELLIDO";
	public $afi_strPrimerNombre="PRIMER_NOMBRE";
	public $afi_strSegundoNombre="SEGUNDO_NOMBRE";
	public $afi_dateFechaNacimiento="FECHA_NACIMIENTO";
	public $afi_strSexo="SEXO";
	public $afi_strTipoAfiliado="TIPO_AFILIADO";
	public $afi_strParentescoCabezaFamilia="PARENTESCO_CABEZA_FAMILIA";
	public $afi_strGrupoProfesiona="GRUPO_POBLACIONAL";
	public $afi_intNivelSisben="NIVEL_SISBEN";
	public $afi_strNumeroFichaSisben="NUMERO_FICHA_SISBEN";
	public $afi_strNucleoFamiliarSisben="NUCLEO_FAMILIAR_SISBEN";
	public $afi_strCodDepm="COD_DEPARTAMENTO";
	public $afi_strCodMunicipio="COD_MUNICIPIO";
	public $afi_strZona="ZONA";
	public $afi_dateFecAfiliacionSGSSS="FEC_AFILIACION_SGSSS";
	public $afi_dateFecAfiliacionEntidadContratante="FEC_AFILIACION_ENTIDAD_CONTRATANTE";
	public $afi_strNumContratoEnteTerritorial="NUM_CONTRATO_ENTE_TERRITORIAL";
	public $afi_dateFecInicioContratoEnteTerritorial="FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL";
	public $afi_strTipoContratoEnteTerritorial="TIPO_CONTRATO_ENTE_TERRITORIAL";
	public $afi_strPertenenciaEtnica="PERTENENCIA_ETNICA";
	public $afi_strEstadoAfiliacion="ESTADO_AFILIACION";
	public $afi_strDireccion="DIRECCION";
	public $afi_strTelefono="TELEFONO";
	public $afi_strLocalidad="LOCALIDAD";
	public $afi_dateFechaCarnetizacion="FECHA_CARNETIZACION";
	public $afi_strBarrio="BARRIO";
	public $afi_strCodIPS="COD_IPS";
	public $afi_strCodContrato="COD_CONTRATO";
	
	/*
	public $afi_strCodAfiliado="COD_AFILIADO";
	public $afi_strCodDane="COD_DANE";
	public $afi_strCodTipoIdentificacion2="COD_TIPO_IDENTIFICACION2";
	public $afi_strCodParentesco2="COD_PARENTESCO2";
	public $afi_strCodTipoAfiliado2="COD_TIPO_AFILIADO2";
	public $afi_strCodEntidadContratante2="COD_ENTIDAD_CONTRATANTE2";
	public $afi_intCodTipoContrato="COD_TIPO_CONTRATO";
	public $afi_strCodZona2="COD_ZONA2";
	public $afi_strCodSexo="COD_SEXO2";
	public $afi_strCodPertenenciaEtnica2="COD_PERTENENCIA_ETNICA2";
	public $afi_strCodNivelSisben2="COD_NIVEL_SISBEN2";
	public $afi_strTTICodTipoIdentificacion2="TTI_COD_TIPO_IDENTIFICACION2";
	public $afi_strCodGrupoPoblacional="COD_GRUP_POBLACIONAL";
	public $afi_strTAFCodAfiliado="TAF_COD_AFILIADO";
	public $afi_strCodEstadoAfiliacion2="COD_ESTADO_AFILIACION2";
	public $afi_strCodARS="COD_ARS";
	public $afi_strTipoIdentificacionCabezaFamilia="TIPO_IDENTIFICACION_CABEZA_FAMILIA";
	public $afi_strNumeroIdentificacionCabezaFamilia="NUMERO_IDENTIFICACION_CABEZA_FAMILIA";
	public $afi_strTipoIdentificacion="TIPO_IDENTIFICACION";
	public $afi_strNumeroIdentificacion="NUMERO_IDENTIFICACION";
	public $afi_strPrimerApellido="PRIMER_APELLIDO";
	public $afi_strSegundoApellido="SEGUNDO_APELLIDO";
	public $afi_strPrimerNombre="PRIMER_NOMBRE";
	public $afi_strSegundoNombre="SEGUNDO_NOMBRE";
	public $afi_intEdad="EDAD";
	public $afi_strSexo="SEXO";
	public $afi_strTipoAfiliado="TIPO_AFILIADO";
	public $afi_strParentescoCabezaFamilia="PARENTESCO_CABEZA_FAMILIA";
	public $afi_strGrupoPoblacional="GRUPO_POBLACIONAL";
	public $afi_intNivelSisben="NIVEL_SISBEN";
	public $afi_strNumeroFichaSisben="NUMERO_FICHA_SISBEN";
	public $afi_strNucleoFamiliarSisben="NUCLEO_FAMILIAR_SISBEN";
	public $afi_strCodDepartamento="COD_DEPARTAMENTO";
	public $afi_strCodMunicipio="COD_MUNICIPIO";
	public $afi_strZona="ZONA";
	public $afi_dateFecAfiliacionSGSSS="FEC_AFILIACION_SGSSS";
	public $afi_dateFecAfiliacionEntidadContratante="FEC_AFILIACION_ENTIDAD_CONTRATANTE";
	public $afi_strNumContratoEnteTerritorial="NUM_CONTRATO_ENTE_TERRITORIAL";
	public $afi_dateFechaInicioContratoEnteTerritorial="FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL";
	public $afi_strTipoContratoEnteTerritorial="TIPO_CONTRATO_ENTE_TERRITORIAL";
	public $afi_strPertenenciaEtnica="PERTENENCIA_ETNICA";
	public $afi_strEstadoAfiliacion="ESTADO_AFILIACION";
	public $afi_strDireccion="DIRECCION";
	public $afi_strTelefono="TELEFONO";
	public $afi_strLocalidad="LOCALIDAD";
	public $afi_dateFechaCarnetizacion="FECHA_CARNETIZACION";*/
}
?>