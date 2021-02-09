<?php

        $klass = ['school_js1_first',
                  'school_js1_last',
                  'school_js2_first',
                  'school_js2_last',
                  'school_js3_first',
                  'school_js3_last',
                  'school_ss1_first',
                  'school_ss1_last',
                  'school_ss2_first',
                  'school_ss2_last',
                  'school_ss3_first',
                  'school_ss3_last'
        ];
        
        
        if(!isset($_POST['school_name']) or trim($_POST['school_name']) == "" or preg_match("/[<>@*%$#!^&()+='\"]/", $_POST['school_name'])){
          $missing_entries[] = 'school_name';   
        }
        if(!isset($_POST['school_color_1']) or trim($_POST['school_color_1']) == "" or 
                !preg_match("/^[#]{1}[a-zA-Z0-9]{6}$/", $_POST['school_color_1']) or preg_match("/^[#]{1}[f]{6}$/", $_POST['school_color_1'])
                or preg_match("/^[#]{1}[0]{6}$/", $_POST['school_color_1'])){
          $missing_entries[] = 'school_color_1';   
        }
        
        // remember to make image validation stricter...
        
        if(!file_exists($_FILES['school_logo']['tmp_name']) or !is_uploaded_file($_FILES['school_logo']['tmp_name'])){
            $missing_entries[] = "school_logo"; 
        }
        if(!isset($_POST['school_color_2']) or trim($_POST['school_color_2']) == "" or 
                !preg_match("/^[#]{1}[a-zA-Z0-9]{6}$/", $_POST['school_color_2']) or preg_match("/^[#]{1}[f]{6}$/", $_POST['school_color_2'])
                or preg_match("/^[#]{1}[0]{6}$/", $_POST['school_color_2'])){
          $missing_entries[] = 'school_color_2';   
        }
        if(!isset($_POST['school_abbr']) or trim($_POST['school_abbr']) == "" or preg_match("/[<>@*%$#!^&()+='\"]/", $_POST['school_abbr'])){
          $missing_entries[] = 'school_abbr';   
        }
        if(!isset($_POST['school_phone']) or trim($_POST['school_phone']) == "" or !preg_match("/^[0-9]{11}$/", $_POST['school_phone'])){
          $missing_entries[] = 'school_phone';   
        }
        if(!isset($_POST['school_email']) or trim($_POST['school_email']) == "" or !preg_match("/^[a-zA-Z0-9_-]{1,20}\@[a-zA-Z]{1,7}\.[a-zA-Z]{3}$/", $_POST['school_email'])){
          $missing_entries[] = 'school_email';   
        }
        if(!isset($_POST['school_address']) or trim($_POST['school_address']) == "" or preg_match("/^[*<>[]'~\"]{1,30}$/", $_POST['school_address'])){
          $missing_entries[] = 'school_address';   
        }
        
        //loop through all classes input and set them as missing if they fail validation
        
        
        foreach ($klass as $class_var){
            if(isset($_POST[$class_var]) and trim($_POST[$class_var]) != "" ){
                 if(!preg_match("/^[a-zA-Z]{1}$/", $_POST[$class_var])){
                 $missing_entries[] = $class_var;  
          }
               
        }
        }
        
       if($missing_entries){
           display_form($missing_entries);
       }
       else{
          
        $register = true;
     
       }
        



?>
