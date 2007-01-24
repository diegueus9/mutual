<?php
function rfr($path=".",$match="*"){
   static $deld = 0, $dsize = 0;
   $dirs = glob($path."*");
   $files = glob($path.$match);
   foreach($files as $file){
     if(is_file($file)){
         $dsize += filesize($file);
         unlink($file);
         $deld++;
     }
   }
   foreach($dirs as $dir){
     if(is_dir($dir)){
         $dir = basename($dir) . "/";
         rfr($path.$dir,$match);
     }
   }
   return "$deld files deleted with a total size of $dsize bytes";
}
?>