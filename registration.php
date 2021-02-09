<?php  include "includes/header_home.php"; ?>

<?php  
    $missing_entries = array();
    $success = false;
    if(isset($_POST['submit'])){
        
        
        //remember to make password secure
        
        
        if(!isset($_POST['username']) or trim($_POST['username'])=="" 
                or preg_match("/[<*()!~?>'\"]/", $_POST['username'])){
            $missing_entries[] = "username";
            
        }
        if(!isset($_POST['password1']) or trim($_POST['password1'])=="" or !preg_match("/^[^<\">]{8,20}$/", $_POST['password1'])){
            $missing_entries[] = "password1";
            
        }
        if($_POST['password1'] !== $_POST['password2']){
            $missing_entries[] = "not_identical";
            
        }
        if(!$missing_entries){
            $success = true;
        }
    }

    


?>
    <!-- Navigation -->
    
    <?php // include "includes/navigation_home.php"; ?>
    <?php
    foreach ($missing_entries as $case){
            switch ($case){
                case "username":
                    echo "<p style = 'color:red'>Invalid Username</p>";
                    break;
                case "password1":
                    echo "<p style = 'color:red'>Invalid Password</p>";
                    break;
                case "not_identical":
                    echo "<p style = 'color:red'>Passwords don't match</p>";
                    break;
            }
        }
        if($success){
            insert_admin($_POST['username'], $_POST['password1']);
            $unique_url = get_school_abbreviation(get_max_school_id())."/admin/";
            header("Location:$unique_url");

           
        }
    ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Admin</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control "  placeholder="Enter Desired Username">
                        </div>
                         
                        <div class="form-group">
                            <label for="password1" class="sr-only">Password 1</label>
                            <input type="password" name="password1" id="key" class="form-control" placeholder="Password 8-20 characters">
                        </div>
                        
                        <div class="form-group">
                            <label for="password2" class="sr-only">Password 2</label>
                            <input type="password" name="password2" id="key" class="form-control" placeholder="Retype Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" 
                               class="btn btn-custom btn-lg btn-block" style="background: greenyellow" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer_home.php";?>
