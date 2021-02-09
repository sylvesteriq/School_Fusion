<?php require_once 'functions.php'; ?>

<?php
   //create_tables("poultry");
    // echo get_max_school_id();
     //$prefix = "gkfk\" w3'h_e..re\"";
    // echo $prefix;
    //$prefix = preg_replace("/[^a-zA-Z0-9_]+/", "", $prefix);
    // echo "<br>".$prefix;
//$value = $prefix;
//echo $value = preg_replace("/[' \"]/", "", $value);

     
     //create a file

//     $file = "example.php";
//if($handle  = fopen($file, "w")){
//    fwrite($handle, "3");
//    fclose($handle);
//}
// else {
//    echo 'failed to create file';
//}   
////fclose($handle);
//if($handle  = fopen($file, "r")){
//    echo fread($handle, 1);
//    fclose($handle);
//}
     
     //
//$p = "<#%+{}&|~'?:>*./\\\"";
//echo $p = preg_replace("<[+{}%&#~|'\"?:.*\>\<\/\\\]>", "", $p);


$dir = getcwd();
$h = "tony";
mkdir($dir."/".$h);
$handle = opendir($dir);
while($file = readdir($handle)){
    if($file != "." && $file != ".."){
        copy($file, $dir."/".$h."/". basename($file));
    }
}
?>