<?php
        $school_name = clean_input($_POST['school_name']);
        
        $school_color_1 = clean_input($_POST['school_color_1']);
        $school_color_2 = clean_input($_POST['school_color_2']);
              
        //remove all unwanted characters, whitespace too
        
        $school_abbr = preg_replace("<[+ {}%&#~|'\"?:.*\>\<\/\\\]>", "",$_POST['school_abbr']);
        
        $school_logo = clean_input($_FILES['school_logo']['name']);
        
        $school_addr = clean_input($_POST['school_address']);
        $school_phone = clean_input($_POST['school_phone']);
        $school_email = clean_input($_POST['school_email']);
        
        $class_input = [
            clean_input($_POST['school_js1_first']),
            clean_input($_POST['school_js1_last']),
            clean_input($_POST['school_js2_first']),
            clean_input($_POST['school_js2_last']),
            clean_input($_POST['school_js3_first']),
            clean_input($_POST['school_js3_last']),
            clean_input($_POST['school_ss1_first']),
            clean_input($_POST['school_ss1_last']),
            clean_input($_POST['school_ss2_first']),
            clean_input($_POST['school_ss2_last']),
            clean_input($_POST['school_ss3_first']),
            clean_input($_POST['school_ss3_last'])
            ];
        
        $class_names = [
            'js1',
            'js2',
            'js3',
            'ss1',
            'ss2',
            'ss3'
        ];
        $classes = array();
        $c = 0;
        $n = 0;
        while($c < 12){
            $first_class = $class_input[$c++];
            $last_class = $class_input[$c++];
            $class_name = $class_names[$n++];
            
            //ensure entries are not nil before performing further action
            
        if(preg_match("/^[a-zA-Z]$/",$first_class)&& preg_match("/^[a-zA-Z]$/",$last_class)){
            
            $classes = array_merge($classes,
                   getClasses($first_class,
                   $last_class, $class_name));
        }
        
        }
        $school_classes = "";
        foreach ($classes as $class){
            $school_classes .= $class."," ;
        }
       $school_classes = rtrim($school_classes,",");

        try{
            $conn = Database::connect();
        $sql = "insert into school (school_full_name,"
                . "school_abbreviation,school_logo_name,"
                . "school_address,school_phone,"
                . "school_email,school_color_1,school_color_2,"
                . "table_prefix,school_created_time,school_classes"
                . ") values (:name,:abbr,:logo,:addr,:phone,:email,"
                . ":color1,:color2,:prefix,now(),:classes)";
            $st = $conn->prepare($sql);

//            
            $st->bindValue(":name", $school_name,PDO::PARAM_STR);
            $st->bindValue(":abbr", $school_abbr,PDO::PARAM_STR);
            $st->bindValue(":logo", $school_logo,PDO::PARAM_STR);
            $st->bindValue(":addr", $school_addr,PDO::PARAM_STR);
            $st->bindValue(":phone", $school_phone,PDO::PARAM_STR);
            $st->bindValue(":email", $school_email,PDO::PARAM_STR);
            $st->bindValue(":color1", $school_color_1,PDO::PARAM_STR);
            $st->bindValue(":color2", $school_color_2,PDO::PARAM_STR);
            $st->bindValue(":prefix", $school_abbr,PDO::PARAM_STR);
            $st->bindValue(":classes", $school_classes,PDO::PARAM_STR);
            $st->execute();
            
            //get new school id
            
            $school_id = (int)get_max_school_id();
            
            
            $conn = null;
            $st = null;
            
            
            echo "<br>successful";
            
            
            
           // header("Location:new_school.php");
            
        } catch (PDOException $ex) {
            $conn = null;
            $st = null;
            die("failed to create school ".$ex->getMessage());
        }


?>
