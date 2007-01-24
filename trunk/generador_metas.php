<?php
require_once("config.php");
require_once("config_generadormetas.php");
class GeneradorMetas{
	/**
	 * Esta variable representa la conexión con la base de datos.
	 *
	 * @var unknown_type
	 */
	private $myconn;
	private $carpeta="Temp/Programas";
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
	private function getListadoProgramas(){
		global $TPROGRAMAS,$CODPROGRAMA;
		$this->conectar();
		$sqlquery="SELECT `$CODPROGRAMA` FROM `$TPROGRAMAS` ";
		$resultado=mysql_query($sqlquery) or die("No pudo obtener el listado de programas ".mysql_error());
		return $resultado;
	}
	private function getActividadesPrograma($codPrograma){
		global $TRCUPSPRG,$CODPROGRAMA,$CODACTIVIDAD;
		$programa=intval($codPrograma);
		$this->conectar();
		$sqlquery="SELECT `$CODACTIVIDAD` FROM `$TRCUPSPRG` WHERE `$CODPROGRAMA`=$programa AND `ESTADO`=1;";
		$resultado=mysql_query($sqlquery) or die("No pudo obtener el listado de actividades que tiene el programa ".mysql_error());
		return $resultado;
	}
	private function getGruposEtareos($codActividad){
		global $TRCUPSGEACT,$CODACTIVIDAD,$CODGRP;
		$act=intval($codActividad);
		$this->conectar();
		$sqlquery="SELECT `$CODGRP` FROM `$TRCUPSGEACT` WHERE `$CODACTIVIDAD`=$act AND `ESTADO`=1;";
		$resultado=mysql_query($sqlquery) or die("No pudo obtener el listado de grupos etareos que tiene la actividad ".mysql_error());
		return $resultado;
	}
	private function actualizarMetasPrograma($codPrograma,$metas){
		global $TMETAS,$CODPROGRAMA,$AREALIZAR;
		$this->conectar();
		$programa=intval($codPrograma);
		$sqlquery="UPDATE `$TMETAS` SET `$AREALIZAR` = $metas WHERE `$CODPROGRAMA` = $programa ;";
		mysql_query($sqlquery) or die("No se pudieron actualizar los valores de las metas ".mysql_error());
	}
	private function generarMetasPrograma($codPrograma){
		global $TGRUPOSETAREOS,$CODGRP,$FRECMETAS,$FREC;
		$metas=0;
		$this->conectar();
		$lisActividades=$this->getActividadesPrograma($codPrograma);
		while ($act=mysql_fetch_array($lisActividades)){
			$lisGrupos=$this->getGruposEtareos($act[0]);
			while ($grp=mysql_fetch_row($lisGrupos)){
				$codgrp=intval($grp[0]);
				$sqlquery="SELECT `$FRECMETAS`,`$FREC` FROM `$TGRUPOSETAREOS` WHERE `$CODGRP`=$codgrp ;";
				$resultado=mysql_query($sqlquery) or die("No pudo obtener la cantidad de afiliados que pertenecen al grupo y la frecuencia pedida ".mysql_error());
				while ($arr=mysql_fetch_row($resultado)){
					$meta=intval($arr[0])*intval($arr[1]);
					$metas=$metas+$meta;
				}
			}
		}
		$this->actualizarMetasPrograma($codPrograma,$metas);
	}
	private function getMetaPrograma($programa){
		global $TMETAS,$AREALIZAR,$CODPROGRAMA;
		$prg=intval($programa);
		$sqlquery="SELECT `$AREALIZAR` FROM `$TMETAS` WHERE `$CODPROGRAMA`=$prg;";
		$resultado=mysql_query($sqlquery) or die("No se pudo obtener los datos de las metas ".mysql_error());
		$res=mysql_fetch_row($resultado);
		return $res[0];
	}
	private function getAfiliados($codGrupo){
		global $TRELACIONAL;
		global $CODGRP;
		global $IDENUNICO;
		$grp=intval($codGrupo);
		$sqlquery="SELECT `$IDENUNICO` FROM `$TRELACIONAL` WHERE `$CODGRP`=$grp;";
		$resultado=mysql_query($sqlquery) or die("No se pudo obtener la lista de afiliados que pertenece al grupo etareo ".mysql_error());
		return $resultado;
	}
	private function relacionarProgramaAfiliados($codPrograma){
		global $IDENUNICO,$CODPROGRAMA,$CODACTIVIDAD;
		global $TRPRGAFI;
		$this->conectar();
		
		$sqlquery="TRUNCATE TABLE `$TRPRGAFI`;";
		mysql_query($sqlquery) or die("Error al vaciar la tabla que relaciona los afiliados con los programas. ".mysql_error());
		
		
		$lisActividades=$this->getActividadesPrograma($codPrograma);
		while ($act=mysql_fetch_array($lisActividades)){
			$lisGrupos=$this->getGruposEtareos($act[0]);
			while ($grp=mysql_fetch_row($lisGrupos)){
				$lisAfiliados=$this->getAfiliados($grp[0]);
				while ($afi=mysql_fetch_row($lisAfiliados)){				
					$prg=intval($codPrograma);
					$cups=intval($act[0]);
					$codafi=intval($afi[0]);
					$sqlquery="INSERT INTO `$TRPRGAFI` (`$CODPROGRAMA`,`$CODACTIVIDAD`,`$IDENUNICO`) VALUES ($prg,$cups,$codafi);";
					mysql_query($sqlquery) or die("No se pudo actualizar la lista de afiliados que pertenecen a un programa ".mysql_error());
				}
				
				
			}
		}
	}
	private function generarAfiliadosPrograma(){
		$lisProgramas=$this->getListadoProgramas();
		while ($prog=mysql_fetch_row($lisProgramas)){
			$this->relacionarProgramaAfiliados($prog[0]);
		}
	}
	private function escribirListadoProgramas($nombre,$linea){
		$le = fopen($this->carpeta."/".$nombre.".txt", "a");
		$linea.="\n";
		fwrite($le, $linea);
		fclose($le) ;
	}
	public function generarMetas(){
		$lisProgramas=$this->getListadoProgramas();
		while ($prog=mysql_fetch_row($lisProgramas)){
			$this->generarMetasPrograma($prog[0]);
		}
	}
	public function generarListasProgramas(){
		global $TABLEAFILIADOS,$NOMBRE,$DESCCUPS,$PN,$SN,$PA,$SA,$DIR,$TEL,$TPROGRAMAS,$TCUPS,$CODPROGRAMA;
		$lisProgramas=$this->getListadoProgramas();
		while ($prog=mysql_fetch_row($lisProgramas)){
			$this->generarAfiliadosPrograma($prog[0]);
			$prg=intval($prog[0]);
			$sqlquery="SELECT `$NOMBRE` , `$DESCCUPS`  , `$PN` , `$SN` , `$PA` , `$SA` , `$DIR` , `$TEL` FROM `$TPROGRAMAS` , `$TCUPS` , `$TABLEAFILIADOS` WHERE `$CODPROGRAMA` =$prg ;";
			$resultado=mysql_query($sqlquery) or die("No se pueden generar la lista de afiliados por programa ".mysql_error());
			while ($res=mysql_fetch_assoc($resultado)){
				$this->escribirListadoProgramas($res[$NOMBRE],$res[$DESCCUPS].": ".$res[$PN]." ".$res[$SN]." ".$res[$PA]." ".$res[$SA].",".$res[$DIR].",".$res[$TEL]);
			}
		}
	}
	/**
	 * Esta funcion retorna un arreglo con el nombre del programa, la descripcion y la meta.
	 * esta ultima depende de un indicador:
	 * 0 -> anual
	 * 1 -> mensual
	 * 2 -> diaria
	 *
	 * @param int $indicador
	 * @return unknown
	 */
	public function getMetas($indicador=0){
		global $TPROGRAMAS,$AREALIZAR,$CODPROGRAMA,$NOMBRE,$DESC;
		$cursorArreglo=0;
		$valor=0;
		if ($indicador==0){
			$valor=1;
		}
		elseif ($indicador==1){
			$valor=12;
		}
		elseif ($indicador==2) {
			$valor=288;
		}
		$sqlPrograma="SELECT `$NOMBRE`,`$DESC`,`$CODPROGRAMA` FROM `$TPROGRAMAS`;";
		$resultado=mysql_query($sqlPrograma) or die("No se pudieron obtener los datos de los programas ".mysql_error());
		while ($prog=mysql_fetch_assoc($resultado)){
			$arrayData[$cursorArreglo][$NOMBRE]=$prog[$NOMBRE];
			$arrayData[$cursorArreglo][$DESC]=$prog[$DESC];
			$arrayData[$cursorArreglo][$AREALIZAR]=floatval($this->getMetaPrograma($prog[$CODPROGRAMA])/$valor);
			$cursorArreglo++;
		}
		return $arrayData;
	}
	
}
$a =new GeneradorMetas();
$a->generarMetas();
$a->generarListasProgramas();
?>