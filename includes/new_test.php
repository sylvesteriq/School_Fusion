<?php

    include_once "../functions_home.php";
    
    echo "<br>".$_POST['school_name']."<br>";
    echo $_POST['school_color_1']."<br>";
    echo $_POST['school_color_2']."<br>";
    echo $_POST['school_abbr']."<br>";
    echo $_FILES['school_logo']['name']."<br>";
    echo $_POST['school_address']."<br>";
    echo $_POST['school_phone']."<br>";
    echo $_POST['school_email']."<br>";
    echo $_POST['school_name']."<br>";
    echo $_POST['school_name']."<br>";
        
 
          echo  clean_input($_POST['school_js1_first'])."<br>";
          echo  clean_input($_POST['school_js1_last'])."<br>";
          echo  clean_input($_POST['school_js2_first'])."<br>";
          echo  clean_input($_POST['school_js2_last'])."<br>";
          echo  clean_input($_POST['school_js3_first'])."<br>";;
          echo  clean_input($_POST['school_js3_last'])."<br>";
          echo  clean_input($_POST['school_ss1_first'])."<br>";
          echo  clean_input($_POST['school_ss1_last'])."<br>";
          echo  clean_input($_POST['school_ss2_first'])."<br>";
          echo  clean_input($_POST['school_ss2_last'])."<br>";
          echo  clean_input($_POST['school_ss3_first'])."<br>";
          echo  clean_input($_POST['school_ss3_last'])."<br>";
            


?>