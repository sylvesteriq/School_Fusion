<?php 
    require_once '../../includes/database.php';
    
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

            function clean_output($value){
                return htmlspecialchars($value,ENT_QUOTES,'utf-8');
        }
        
            function clean_input($value){
                $value = preg_replace("/['\"]/", "", $value);
                return strip_tags($value);
            }
            
            function getClasses($first,$last,$level){
              
            //put code to retrieve classes from classes table
                
        }

        function get_school_details($id){
            //get all details concerning a school
            
            $conn = Database::connect();
            $sql_school_details = "select * from school where school_id = :id";
            
            try{
                $stmt_school_details = $conn->prepare($sql_school_details);
                $stmt_school_details->bindValue("id", $id,PDO::PARAM_INT);
                $stmt_school_details->execute();
                
                $row = $stmt_school_details->fetch();
                
                $stmt_school_details = "";
                $conn = "";
                
                return $row;
            } catch (PDOException $ex) {
                $stmt_school_details = "";
                $conn = "";
                
                die("failed to get details");
            }
            }
        
        // get school id from current working directory
            
            function get_school_id(){
                if($handle = @fopen(getcwd()."/school_id.php", 'r')){
                $id = (int)fread($handle, 5);
                fclose($handle);
                     return $id;
                
                }
                elseif ($handle = @fopen(getcwd()."/admin/school_id.php", 'r')) {
                $id = (int)fread($handle, 5);
                fclose($handle);
                     return $id;
            }
                else {
                    die("failed to get school id");
                }
            }

            //get school abbreviation without passing in an argument
            
            function school_abbreviation(){
                $id = get_school_id();
                
                $conn = Database::connect();
                $sql = "select school_abbreviation as abbr from school where school_id"
                        . " = :id";
                try{
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(":id", $id,PDO::PARAM_INT);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    return $row["abbr"];

                } catch (PDOException $ex) {
                    die("failed");
                }
            }
        
            function get_admin_name($pre){
                $staff_table = $pre."_staff";
                $conn = Database::connect();
                $sql = "select staff_username as username from $staff_table where staff_id = 1";
                try{
                    $stmt = $conn->prepare($sql);
                   // $stmt->bindValue(":id", $id,PDO::PARAM_INT);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    return $row["username"];

                } catch (PDOException $ex) {
                    die("failed");
                }
                
            }
     

    
    
    


            ?>