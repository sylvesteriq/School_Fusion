<?php
include_once 'functions_home.php';
    //$dest = "tony";
   // $dirPath = getcwd();
   // $destPath = $dirPath."/".$dest;
    $dest = "tony";
    $dir_path = getcwd()."/school_files";
    $dest_path = getcwd()."/".$dest;
    
    
    recursive_move($dir_path, $dest_path);
    //tranverse($dirPath, $destPath);
    
    function tranverse($dir,$destPath){
        
        if(!$handle = opendir($dir)){
            die("failed to open directory");
        }
      // echo "<h2>displaying contents of $dir"."...</h2>";
        
       $files = array();
       while($file = readdir($handle) ){
           if($file != "." && $file != ".."){
               if(is_dir($dir."/".$file)){
                   $files[] = $file."/";
               }
               else{
                   $files[] = $file;
               }
           }
       }
       mkdir($destPath);
       sort($files);
       echo "<ul>";
       foreach ($files as $item){
           echo "<li>$item</li>";
           if(substr($item, -1) == "/"){
               mkdir($destPath."/".substr($item, 0,-1));
              // echo " hello";
           }
           else {
               copy($dir."/".$item, $destPath."/". basename($item));
              // echo "hello";
           }
       }
       echo "</ul>";
       
       foreach($files as $item2){
           if(substr($item2, -1) == "/"){
               tranverse($dir."/".substr($item2, 0 ,-1),$destPath."/".substr($item2, 0,-1));
           }
       }
       closedir($handle);
       
    }



    
        function tranverse_copy($dir){
        if(!$handle = opendir($dir)){
            die("failed to open directory");
        }
       echo "<h2>displaying contents of $dir"."...";
        
       $files = array();
       while($file = readdir($handle) ){
           if($file != "." && $file != ".."){
               if(is_dir($dir."/".$file)){
                   $files[] = $file."/";
               }
               else{
                   $files[] = $file;
               }
           }
       }
       sort($files);
       echo "<ul>";
       foreach ($files as $item){
           echo "<li>$item</li>";
       }
       echo "</ul>";
       
       foreach($files as $item2){
           if(substr($item2, -1) == "/"){
               tranverse_copy($dir."/".substr($item2, 0 ,-1));
           }
       }
       closedir($handle);
       
    }

    //tranverse_copy($dirPath);


?>