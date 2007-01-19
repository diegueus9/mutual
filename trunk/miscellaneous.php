<?php
function stripComillas($cadena){
	$nuevaCadena="";
	$a=substr($cadena,-1);
	$b=substr($cadena,0,1);
	if ($a=='"' and $b=='"'){
		$nuevaCadena=substr($cadena,1,-1);
		return $nuevaCadena;
	}
	elseif ($a=='"' ){
		$nuevaCadena=substr($cadena,0,-1);
		return $nuevaCadena;
	}
	elseif ($b=='"'){
		$nuevaCadena=substr($cadena,1);
		return $nuevaCadena;
	}
	else {
		return $cadena;
	}	
}

function esFechaValida($strFecha){
	$esValida=true;
	list( $year, $month,  $day) = split('[/.-]', $strFecha);	
	if (!(checkdate($month,$day,$year))){
		$esValida=false;
	}
	$today=date("Y/m/d");
	list( $tyear,$tmonth,$tday ) = split('[/.-]', $today);	
	$utr=mktime(0,0,0,$month,$day,$year);
	$utt=mktime(0,0,0,$tmonth,$tday,$tyear);
	if ($utt-$utr<0){
		$esValida=false;
	}
	return $esValida;
}

function redirect ($varStrPath){
		
		echo "<script language=\"javascript\">";
		echo "window.location=\"$varStrPath\"";
		echo "</script>";
		echo "<p>Javascript is disabled in your browser.  <a href='$varStrPath'>Click here</a> to continue.</p>";
		
	}
function arreglarFechaSQL($strFecha){
	list( $day,$month, $year) = split('[/.-]', $strFecha);
	$fechaArreglada=$year."-".$month."-".$day;
	return $fechaArreglada;
}
?>