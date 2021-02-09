<?php
    if(isset($_POST['create_school'])){
        
        echo $_POST['school_name']."<br>";
        echo $_FILES['school_logo']['name']."<br>";
        echo $_POST['school_color_one']."<br>";
        echo $_POST['school_color_two']."<br>";
        echo $_POST['school_telephone']."<br>";
        echo $_POST['school_email']."<br>";
        echo $_POST['school_address']."<br>";
        
    }



?>