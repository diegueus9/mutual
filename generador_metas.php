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
	private function inscribirAfiliados(){
		$this->getListadoProgramas();
	}
	public function generarMetas(){
		$lisProgramas=$this->getListadoProgramas();
		while ($prog=mysql_fetch_row($lisProgramas)){
			$this->generarMetasPrograma($prog[0]);
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
print_r($a->getMetas());
?>