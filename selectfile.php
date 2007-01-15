<?php 
include_once("admin/inc.php");

$tplSelect=new TplLoad;
$tplSelect->assign("path", $strProgramPath);
$tplSelect->display("selectfile.tpl");
?>
<!--form action="loadfile.php" method="post" enctype="multipart/form-data">    
    <br>
    <b>Enviar un nuevo archivo: </b>
    <br>
    <input name="userfile" type="file">
    <br>
    <input type="submit" value="Enviar">
</form--> 