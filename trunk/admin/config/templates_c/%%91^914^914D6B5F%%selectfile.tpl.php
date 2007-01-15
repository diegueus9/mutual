<?php /* Smarty version 2.6.15, created on 2007-01-05 13:07:42
         compiled from selectfile.tpl */ ?>
<h1>El path del programa completo es: <?php echo $this->_tpl_vars['path']; ?>
</h1>
<br>
<form action="loadfile.php" method="post" enctype="multipart/form-data">    
    <br>
    <b>Enviar un nuevo archivo: </b>
    <br>
    <input name="userfile" type="file">
    <br>
    <input type="submit" value="Enviar">
</form> 