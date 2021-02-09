<?php 
    require_once 'includes/database.php';
    
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
            function clean_output($value){
                return htmlspecialchars($value,ENT_QUOTES,'utf-8');
        }
        
            function clean_input($value){
                $value = preg_replace("/['<>\"]/", "", $value);
                return strip_tags($value);
            }
            function getClasses($first,$last,$level){
              $alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l'
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

        
        function create_tables($school_id){
           $pre = get_school_abbreviation($school_id);
            //consider passing $school_id as an argument to this function
            
           //  = get_max_school_id();
            //$prefix = $pre;

            //strip html tags
            $prefix = strip_tags($pre);
            $prefix = preg_replace("/[^a-zA-Z0-9_]+/", "", $prefix);

            //create student table query

            $table_name = $prefix."_students";

            $create_table_sql = "create table {$table_name} ( "
                        . "student_id smallint(6) not null auto_increment,"
                        . "student_firstname varchar(30) not null,"
                        . "student_lastname varchar(30) not null,"
                        . "student_username varchar(30) not null unique,"
                        . "student_password varchar(41) not null,"
                        . "student_image varchar(6) not null,"
                    . "student_class_id smallint(2) not null,"                  //identifies the class he/she belongs to
                    . "student_no_in_class smallint(3) not null,"               //student's number in the class
                        . "primary key(student_id)"
                        . " )";
            create_table_query($create_table_sql);


            //create staff table query

            $table_name = $prefix."_staff";
            $create_table_sql = "create table {$table_name} ( "
                        . "staff_id smallint(3) not null auto_increment,"
                        . "staff_firstname varchar(30) not null,"
                        . "staff_lastname varchar(30) not null,"
                        . "staff_username varchar(30) not null unique,"
                        . "staff_password varchar(41) not null,"
                        . "staff_image varchar(6) not null,"
                        . "primary key(staff_id)"
                        . " )";
            create_table_query($create_table_sql);

            //create classes table query

            $table_name = $prefix."_classes";
            $create_table_sql = "create table {$table_name} ( "
                        . "class_id smallint(2) not null auto_increment,"
                        . "class_name varchar(4) not null unique,"                 //jss1 for example
                        . "class_number smallint(3) not null,"                     //number of students in class
                        . "class_form_teacher_id smallint(3) not null,"            //identifies class form teacher
                        . "primary key(class_id)"
                        . " )";
            create_table_query($create_table_sql);

            populate_classes_table((int)$school_id,$table_name);
            
            
            
            //create subjects table query

            $table_name = $prefix."_subjects";
            $create_table_sql = "create table {$table_name} ( "
                        . "subject_id smallint(3) not null auto_increment,"    //identifies each subject for each class
                        . "subject_name varchar(30) not null,"                
                        . "subject_class varchar(3) not null,"                 //holds things like ss1, ss2 etc
                        . "subject_teacher_1_id smallint(3) not null,"         //first teacher in charge of the subject and class
                        . "subject_teacher_2_id smallint(3) not null,"         //second teacher assisting
                        . "primary key(subject_id)"
                        . " )";
            create_table_query($create_table_sql);

            //create subjects table query

            $table_name = $prefix."_results";
            $create_table_sql = "create table {$table_name} ( "
                        . "result_id smallint(6),"
                        . "result_student_id smallint(6) not null,"    
                        . "result_subject_id smallint(3) not null,"                
                        . "result_cat_score smallint(3) not null,"                
                        . "result_exam_score smallint(3) not null,"         
                        . "result_total smallint(3) not null,"
                        . "result_grade char(1),"         
                        . "primary key(result_id),"
                        . "unique key(result_student_id,result_subject_id)"
                        . " )";
            create_table_query($create_table_sql);

            //populate_classes_table();
            
        }

        //function to execute table creation query
    
    function create_table_query($create_table_sql){
        
        
        $create_table_conn = Database::connect();

        try{
            $create_table_st = $create_table_conn->prepare($create_table_sql);   
            $create_table_st->execute();
            echo "successfully created";
            
            
            $create_table_conn = null;
            $create_table_st = null;
        } catch (PDOException $ex) {
            $create_table_conn = null;
            $create_table_st = null;
            die("failed ".$ex->getMessage());
        }


        
    }
    
    function get_max_school_id(){
            //get new school id
            $conn = Database::connect();  
    $sql_get_id = "select max(school_id) as id from school";
    
    try{
        $st_get_id = $conn->prepare($sql_get_id);
        $st_get_id->execute();
        $row = $st_get_id->fetch();
        return $row['id'];
    } catch (PDOException $ex) {
        die("failed");
    }

    }
    
    //populate the classes table with admin selected classes
    
    function populate_classes_table($school_id,$table_name){
        
        $conn = Database::connect();
        $sql_get_classes = "select school_classes from school where school_id = :school_id";
        $sql_insert_classes = "insert into $table_name(class_name) values (:class_name) ";
        
        //get school classes from school table
        
        $st_get_classes = $conn->prepare($sql_get_classes);
        $st_get_classes->bindValue(":school_id", $school_id,PDO::PARAM_INT);
        $st_get_classes->execute();
        $row = $st_get_classes->fetch();
        
        //remove last comma(,) in class string
        
        $class_string = strip_tags($row['school_classes']);
        
        $classes = explode(",", $class_string);
        
        //insert into classes table
        
        $st_insert_class = $conn->prepare($sql_insert_classes);
        foreach ($classes as $class){
            $st_insert_class->bindValue(":class_name", $class,PDO::PARAM_STR);
            $st_insert_class->execute();
        }
        
    }

    
    
function recursive_move($dir,$destPath){
        
        if(!$handle = opendir($dir)){
            die("failed to open directory");
        }
      
        
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
       if(!file_exists($destPath)){
       mkdir($destPath);    
       }
           
       
       sort($files);
       
       foreach ($files as $item){
           
           if(substr($item, -1) == "/"){
               mkdir($destPath."/".substr($item, 0,-1));
              
           }
           else {
               copy($dir."/".$item, $destPath."/". basename($item));
              
           }
       }
       
       
       foreach($files as $item2){
           if(substr($item2, -1) == "/"){
               recursive_move($dir."/".substr($item2, 0 ,-1),$destPath."/".substr($item2, 0,-1));
           }
       }
       closedir($handle);
       
    }
    
    function get_school_abbreviation($id){
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
    function delete_tables($pre){
        $conn = Database::connect();
        $prefix = ["classes","results","staff","subjects","students"];
        
        foreach ($prefix as $p){
            $table = $pre."_".$p;
            $sql = "drop table $table";
            try{
                $st = $conn->prepare($sql);
                $st->execute();
            } catch (PDOException $ex) {
                die("operation failed ".$ex->getMessage());
            }
            
        }
         echo 'success';
    }

    function create_school_id_file($dir,$school_id){
        $handle = fopen($dir."/admin/"."school_id.php", "w");
        fwrite($handle, $school_id);
        fclose($handle);
    }
    function insert_admin($username, $password){
        $pre = get_school_abbreviation(get_max_school_id());
        $password = encrypt_password($password);
        
        $staff_table = $pre."_staff";
        
        $conn = Database::connect();
        $sql = "insert into $staff_table (staff_username,staff_password) values (:username, :password)";
        try{
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", $password);
            $stmt->execute();
        } catch (PDOException $ex) {
            die(" failed to create admin");
        }
        
    }
    function encrypt_password($p){
        $password = password_hash($p, PASSWORD_DEFAULT,["cost"=>12]);
        return $password;
    }
    
?>