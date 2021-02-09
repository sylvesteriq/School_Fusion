<?php
        $school_name = $_POST['school_name'];
        
        $school_color_1 = $_POST['school_color_1'];
        $school_color_2 = $_POST['school_color_2'];
               
        $school_abbr = $_POST['school_abbr'];
        
        $school_logo = $_FILES['school_logo']['name'];
        
        $school_addr = $_POST['school_address'];
        $school_phone = $_POST['school_phone'];
        $school_email = $_POST['school_email'];
        
        $class_input = [
            $_POST['school_jss1_first'],
            $_POST['school_jss1_last'],
            $_POST['school_jss2_first'],
            $_POST['school_jss2_last'],
            $_POST['school_jss3_first'],
            $_POST['school_jss3_last'],
            $_POST['school_ss1_first'],
            $_POST['school_ss1_last'],
            $_POST['school_ss2_first'],
            $_POST['school_ss2_last'],
            $_POST['school_ss3_first'],
            $_POST['school_ss3_last']];
        
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
        
        $classes = array_merge($classes,
                   getClasses($class_input[$c++],
                   $class_input[$c++], $class_names[$n++]));
        }
        $school_classes = "";
        foreach ($classes as $class){
            $school_classes .= $class."," ;
        }
       

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
