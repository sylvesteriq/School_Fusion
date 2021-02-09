<?php 
    
    //function for displaying page header
    
    function displayPageHeader($pageTitle){
        
    ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="design.css"/>
        <title><?php echo "$pageTitle"; ?></title>
        <style type="text/css">
            th { text-align: left; background-color: #bbb; }
            th, td { padding: 0.4em; }
            tr.alt td { background: #ddd; }
            .error {background: #d33; color: white; padding: 0.2em }
        </style>
    </head>
    <body
        
        <?php
    }
        ?>
        
        
        
        <?php
        //function for displaying page footer
            function displayPageFooter(){
        ?>
    </body>
</html>
    <?php
            }
            function listAlphabets(){
                $alphabet = ['nil','a','b','c','d','e','f','g','h','i','j','k','l'
                ,'m','n','o','p','q','r','s','t','u','v','w','x','y','z'] ;
                
                foreach ($alphabet as $value) {
                    echo"<option>".$value."</option>";


                }
            }
            function clean($value){
                return htmlspecialchars($value,ENT_QUOTES,'utf-8');
        }
            function getClasses($first,$last,$level){
              $alphabet = ['nil','a','b','c','d','e','f','g','h','i','j','k','l'
                ,'m','n','o','p','q','r','s','t','u','v','w','x','y','z'] ;
                
              $key_1 = array_search($first, $alphabet);
              $key_2 = array_search($last, $alphabet);
              
              if($key_1 != 0){
                for($i = $key_1 ; $i <= $key_2 ; $i++){
                  $classes[] = $level.$alphabet[$i];
                  
              }
              return $classes;
              }
        }



            ?>