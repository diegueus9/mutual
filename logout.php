<?php
include_once("admin/inc.php");
session_start();
session_destroy();
$_SESSION = null;
redirect("index.php");
?>