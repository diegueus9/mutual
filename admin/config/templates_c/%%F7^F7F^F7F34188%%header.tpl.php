<?php /* Smarty version 2.6.15, created on 2007-01-18 19:40:39
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Simers</title>
<link href="general.css" rel="stylesheet" type="text/css" />
<?php if ($this->_tpl_vars['css'] != ""): ?>
<link href="<?php echo $this->_tpl_vars['css']; ?>
.css" rel="stylesheet" type="text/css" />
<?php endif; ?>
</head>
<body>
<div class="main">	
	<div class="headconteiner">
		<div class="title"></div>
		<div class="logo"></div>
		<div class="menu-head"></div>
	</div>	
</div>
<div class="breadcrum">/<?php echo $this->_tpl_vars['appPath']; ?>
</div>
<div class="block"><!-- Inicia bloque de operación, cierra en footer.tpl-->

<?php if ($this->_tpl_vars['menu'] == 'ok'): ?>
	<div class="menu-lateral">
		<div class="menu-box-top"></div>
		<div class="menu-box-body">
			<div class="menu-item"><a href="mod-affiliated.php">Afiliados</a></div>
			<div class="menu-item"><a href="#">Programación</a></div>
			<div class="menu-item"><a href="#">Historia Clinica</a></div>
			<div class="menu-item"><a href="#">Laboratorio Clinico</a></div>
			<div class="menu-item"><a href="#">P Y P</a></div>
			<div class="menu-item"><a href="#">Facturación</a></div>
			<div class="menu-item"><a href="#">Informes</a></div>
			<div class="menu-item"><a href="#">Segimiento a Riesgos</a></div>
			<div class="menu-item"><a href="#">Auditorias</a></div>
			<div class="menu-item"><a href="#">Gestion Documental</a></div>
			<div class="menu-item"><a href="#">SIAU</a></div>
			<div class="menu-item"><a href="logout.php">Salir</a></div>
		</div>
		<div class="menu-box-bottom"></div>
	</div>
<?php endif; ?>