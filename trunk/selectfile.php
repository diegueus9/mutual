<?php 
include_once("admin/inc.php");

include_once("header-inc.php");
new Header("cargar archivo");

$tplSelect=new TplLoad;
$tplSelect->display("selectfile.tpl");

include_once("footer-inc.php");
new Footer();

?>
<!--form action="loadfile.php" method="post" enctype="multipart/form-data">    
    <br>
    <b>Enviar un nuevo archivo: </b>
    <br>
    <input name="userfile" type="file">
    <br>
    <input type="submit" value="Enviar">
</form--> 