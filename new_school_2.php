<?php include_once 'includes/new_header.php'; ?>

<?php


$register = false;
    if(isset($_POST['create_school'])){
        
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
        
        $missing_entries = array();
        if(!isset($_POST['school_name']) or trim($_POST['school_name']) == "" or preg_match("/[<>@*%$#!^&()+='\"]/", $_POST['school_name'])){
          $missing_entries[] = 'school_name';   
        }
        if(!isset($_POST['school_color_1']) or trim($_POST['school_color_1']) == "" or !preg_match("/^[#]{1}[a-zA-Z0-9]{6}$/", $_POST['school_color_1'])){
          $missing_entries[] = 'school_color_1';   
        }
        if(!isset($_POST['school_color_2']) or trim($_POST['school_color_2']) == "" or !preg_match("/^[#]{1}[a-zA-Z0-9]{6}$/", $_POST['school_color_2'])){
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
           echo "success";
       }
        

        
        
        
        
        
//     if(true){
//         $register = true;
//     }   
    }
    if($register){
        include_once 'includes/register_1.php';
        
        //call function to create tables for school
        
        create_tables($school_id);
        
        //recursively copy all necessary new files to new school folder
       
        $dir_to_copy_from = getcwd()."/school_files";
        $dir_to_copy_to = getcwd()."/".get_school_abbreviation($school_id);
        recursive_move($dir_to_copy_from, $dir_to_copy_to);
        
        //create school identity file
        
        create_school_id_file($dir_to_copy_to, $school_id);
        
        
    }
    if(!$missing_entries){
        display_form(array());
    }
    

?>



<?php 
    function display_form($missingFields){
?>
        <div class="container">
        <h1 class="heading"> JOIN US</h1>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="row1">
        <div class="col-md-6 section1">

            <p class="subtitle2"><?php echo (($missingFields) or in_array("school_logo",$missingFields))?"Please select a Logo":"Upload your Logo" ?></p>
                  <div class="forlogo">

                  <div class="preview">
                  <div class="preview2">
                  <i class="fa fa-picture-o fa-3x icon" ></i><br><span class="icon2">Logo Preview</span>
                  </div>
                  </div>

               <div class="fileupload btn btn-primary1 " >
               <span>Select Logo</span>
               <input id="uploadbtn" type="file" class="upload " name="school_logo" />
               </div>

               </div>

               <br>

         <p class="subtitle2"><?php echo ($missingFields)?"Please repick Your Colors":"Pick Your Colors" ?></p>
                <div class="subtitle">Be sure to select two different colors besides white</div>
                <div class="forcolor">

                 <input name="school_color_1" type="color" class="color" required id="picker1"> 
                  <input name="school_color_2" type="color" class="color" required id="picker2">
                  </div>

        </div>

        <div class="col-md-6 section2">
        <p class="subtitle2 ">Fill Out School Profile</p>


        <input type="text" class="form-control1 " placeholder="School Name" name="school_name"
               value="<?php if($missingFields)echo (in_array("school_name",$missingFields))?"":$_POST['school_name'] ?>" >       



        <input type="text" class="form-control1" placeholder="School Abbreviation" name="school_abbr" 
               value="<?php if($missingFields)echo (in_array("school_abbr",$missingFields))?"":$_POST['school_abbr'] ?>">       



        <input type="tel" class="form-control1" placeholder="School Phone Number" name="school_phone" 
               value="<?php if($missingFields) echo (in_array("school_phone",$missingFields))?"":$_POST['school_phone'] ?>">


        <input type="email" class="form-control1" placeholder="School Email"name="school_email" 
               value="<?php if($missingFields) echo (in_array("school_email",$missingFields))?"":$_POST['school_email'] ?>">         
        <textarea placeholder="School Address" class="form-control2" 
                  name="school_address" ><?php if($missingFields)echo (in_array("school_address",$missingFields))?"":$_POST['school_address'] ?></textarea>       


        <div class="tab_wrap">
        <div class="tabs">
            <ul>
                <li><a name="tab" id="tab_1" href="javascript:void(0)" onClick="tabs(1)" class="active">Js1</a></li>
                <li><a name="tab" id="tab_2" href="javascript:void(0)" onClick="tabs(2)">Js2</a></li>
                <li><a name="tab" id="tab_3" href="javascript:void(0)" onClick="tabs(3)">Js3</a></li>
                <li><a name="tab" id="tab_4" href="javascript:void(0)" onClick="tabs(4)">Ss1</a></li>
                <li><a name="tab" id="tab_5" href="javascript:void(0)" onClick="tabs(5)">Ss2</a></li>
                <li><a name="tab" id="tab_6" href="javascript:void(0)" onClick="tabs(6)">Ss3</a></li>
            </ul>
        </div>

        <div name="tab_content" id="tab_content_1" class="tab_content active">
            <input type="text" class="textb" name="school_js1_first" value="<?php echo (isset($_POST['school_js1_first']))?$_POST['school_js1_first']:"" ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js1_last" value="<?php echo (isset($_POST['school_js1_last']))?$_POST['school_js1_last']:"" ?>"/>
        </div>
        <div name="tab_content" id="tab_content_2" class="tab_content">
         <input type="text" class="textb" name="school_js2_first" value="<?php echo (isset($_POST['school_js2_first']))?$_POST['school_js2_first']:"" ?>"/>
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js2_last" value="<?php echo (isset($_POST['school_js2_last']))?$_POST['school_js2_last']:"" ?>"/>
        </div>

        <div name="tab_content" id="tab_content_3" class="tab_content">
         <input type="text" class="textb" name="school_js3_first" value="<?php echo (isset($_POST['school_js3_first']))?$_POST['school_js3_first']:"" ?>"/>
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js3_last" value="<?php echo (isset($_POST['school_js3_last']))?$_POST['school_js3_last']:"" ?>"/>
        </div>

        <div name="tab_content" id="tab_content_4" class="tab_content">
           <input type="text" class="textb" name="school_ss1_first" value="<?php echo (isset($_POST['school_ss1_first']))?$_POST['school_ss1_first']:"" ?>"/>
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss1_last" value="<?php echo (isset($_POST['school_ss1_last']))?$_POST['school_ss1_last']:"" ?>"/>
        </div>

        <div name="tab_content" id="tab_content_5" class="tab_content">
           <input type="text" class="textb" name="school_ss2_first" value="<?php echo (isset($_POST['school_ss2_first']))?$_POST['school_ss2_first']:"" ?>"/>
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss2_last"value="<?php echo (isset($_POST['school_ss2_last']))?$_POST['school_ss2_last']:"" ?>"/>
        </div>

        <div name="tab_content" id="tab_content_6" class="tab_content">
         <input type="text" class="textb" name="school_ss3_first" value="<?php echo (isset($_POST['school_ss3_first']))?$_POST['school_ss3_first']:"" ?>"/>
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss3_last"value="<?php echo (isset($_POST['school_ss3_last']))?$_POST['school_ss3_last']:"" ?>"/>
        </div>
        </div>





        <input type="submit" name="create_school" class="forsubmit" />
        </div>

        </div>
        </form>


        </div>
        <script>
        $("#uploadbtn").on('change',function(){
                if(typeof (FileReader) != "undefined"){
                        var previewholder = $(".preview");
                        previewholder.empty();

                        var reader = new FileReader();
                        reader.onload = function(e){
                                $("<img/>",{
                                        "src": e.target.result,
                                        "class":"preview1"}).appendTo(previewholder);
                        }
                        previewholder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                }else{
                        alert("this browser doesn't support file reader")
                }
        });
        </script>
       <?php } ?>
<?php include_once 'includes/new_footer.php'; ?>
