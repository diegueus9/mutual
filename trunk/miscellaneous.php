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

function getNumberArray($numInicial, $numFinal, $boolWhitLZeros = true){
	
	for ($i=$numInicial; $i <= $numFinal; $i++){		
		$arrayRes[$i] = ( $i < 10 && $boolWhitLZeros )? "0".strval($i) : strval($i);
	}
	return $arrayRes;
}

function getStrTime($hora, $min, $jornada){
	
	if ($jornada == "PM" && $hora != 12){
		$hora = $hora + 12;
	}elseif ($hora == 12 && $jornada == "AM"){
		$hora = 0;
	}
	
	if ($hora < 10) {
		$strRes = "0".strval($hora);
	}else{
		$strRes = strval($hora);
	}
	
	$strRes .= ":";
	
	if ($min < 10) {
		$strRes .= "0".strval($min);
	}else{
		$strRes .= strval($min);
	}
	
	return $strRes;
	
}

?>