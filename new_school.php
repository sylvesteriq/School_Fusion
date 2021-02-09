<?php include_once 'includes/header_home.php'; ?>
<?php include_once 'includes/navigation_home.php'; ?>

<?php
    $register = false;
    if(isset($_POST['create_school'])){
        
     if(true){
         $register = true;
     }   
    }
    if($register){
        include_once 'includes/register.php';
        
        //call function to create tables for school
        
        create_tables($school_id);
        
        //recursively copy all necessary new files to new school folder
       
        $dir_to_copy_from = getcwd()."/school_files";
        $dir_to_copy_to = getcwd()."/".get_school_abbreviation($school_id);
        recursive_move($dir_to_copy_from, $dir_to_copy_to);
        
        //create school identity file
        
        create_school_id_file($dir_to_copy_to, $school_id);
        
        
    }


?>

<div class="col-xs-12">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            
            <label for="school_name"> School Name* :</label>
            <input type="text" name="school_name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="school_color_1"> School Color 1* :</label>
            <input type="color" name="school_color_1" class="form-control" >
        </div>
                <div class="form-group">
            <label for="school_color_2"> School Color 2* :</label>
            <input type="color" name="school_color_2" class="form-control" >
        </div>
        <div class="form-group">
            <label for="school_abbr"> School Abbreviation* :</label>
            <input type="text" name="school_abbr" class="form-control">
        </div>
        <div class="form-group">
            <label for="school_logo"> School logo* :</label>
            <input type="file" name="school_logo" class="form-control">
        </div>
        <div class="form-group">
            <label for="school_address" > School Address* :</label>
            <input type="text" name="school_address" class="form-control" >
        </div>
        <div class="form-group">
            <label for="school_phone_pre"> School Phone* :</label>
            <select type="text" name="school_phone_pre" class="form-control">
                <option value="+234" >+234</option>
            </select>
            <input type="text" name="school_phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="school_email"> School email* :</label>
            <input type="email" name="school_email" class="form-control" >
        </div>
        
        <div class="form-group">
            <label for="school_js1_first"> JSS 1 from* :</label>
            <select type="text" name="school_js1_first" class="form-control" >
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_js1_last"> JSS 1 To* :</label>
            <select type="text" name="school_js1_last" class="form-control" >
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_js2_first"> JSS 2 from* :</label>
            <select type="text" name="school_js2_first" class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_js2_last"> JSS 2 To* :</label>
            <select type="text" name="school_js2_last" class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_js3_first"> JSS 3 from* :</label>
            <select type="text" name="school_js3_first" class="form-control" >
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_js3_last"> JSS 3 To* :</label>
            <select type="text" name="school_js3_last" class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss1_first"> SS 1 from* :</label>
            <select type="text" name="school_ss1_first"  class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss1_last"> SS 1 To* :</label>
            <select type="text" name="school_ss1_last" class="form-control" >
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss2_first"> SS 2 from* :</label>
            <select type="text" name="school_ss2_first" class="form-control" >
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss2_last"> SS 2 To* :</label>
            <select type="text" name="school_ss2_last" class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss3_first"> SS 3 from* :</label>
            <select type="text" name="school_ss3_first" class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <label for="school_ss3_last"> SS 3 To* :</label>
            <select type="text" name="school_ss3_last"  class="form-control">
                <?php listAlphabets(); ?>
                
            </select>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="create_school" cols ="30" rows="10" value="submit">
        </div>
        
    </form>
</div>











<?php include_once 'includes/footer_home.php'; ?>