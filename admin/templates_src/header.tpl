<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simers</title>
<link href="general.css" rel="stylesheet" type="text/css" />
{if $css != ""}
<link href="{$css}.css" rel="stylesheet" type="text/css" />
{/if}
{if $cal == "ok"}
<link rel="stylesheet" type="text/css" media="all" href="jscripts/jscalendar-1.0/skins/aqua/theme.css" />
<script type="text/javascript" src="jscripts/jscalendar-1.0/calendar.js"></script>
<script type="text/javascript" src="jscripts/jscalendar-1.0/calendar-setup.js"></script>
<script type="text/javascript" src="jscripts/jscalendar-1.0/lang/calendar-sp.js"></script>
{/if}
</head>
<body>
<div class="main">	
	<div class="headconteiner">
		<div class="title"></div>
		<div class="logo"></div>
		<div class="menu-head">
			<ul>
				<li><a href="index.php">Principal</a></li>
				<li><a href="../index.html">Nuestra Organización</a></li>
				<li><a href="#">Novedades</a></li>
				<li><a href="#">Preguntas Frecuentes</a></li>
			</ul>
		</div>		
	</div>	
</div>
<div class="breadcrum">/{$appPath}</div>
<div class="block"><!-- Inicia bloque de operación, cierra en footer.tpl-->

{if $menu == "ok"}
	<div class="menu-lateral">
		<!--div class="menu-box-top"></div-->
		<div class="menu-box-body">
			<div class="menu-item"><a href="index.php">Inicio</a></div>
			<div class="menu-item"><a href="mod-affiliated.php">Afiliados</a></div>
			<div class="menu-item"><a href="mod-schedule.php">Programación</a></div>
			<div class="menu-item"><a href="#">Historia Clinica</a></div>
			<div class="menu-item"><a href="#">Laboratorio Clinico</a></div>
			<div class="menu-item"><a href="#">P Y P</a></div>
			<div class="menu-item"><a href="#">Facturación</a></div>
			<div class="menu-item"><a href="#">Informes</a></div>
			<div class="menu-item"><a href="#">Segimiento a Riesgos</a></div>
			<div class="menu-item"><a href="#">Auditorias</a></div>
			<div class="menu-item"><a href="#">Gestion Documental</a></div>
			<div class="menu-item"><a href="#">SIAU</a></div>
			<div class="menu-item"><a href="#">Administración</a></div>
			<div class="menu-item"><a href="logout.php">Salir</a></div>
		</div>
		<!--div class="menu-box-bottom"></div-->
	</div>
{/if}