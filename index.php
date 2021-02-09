<?php include_once 'includes/new_header.php'; ?>

<?php
$missing_entries = array();

$register = false;
    if(isset($_POST['create_school'])){
        

        include_once 'includes/validate_entries.php';   
        
        
        
        
       
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
        
        header("Location:registration.php");
        
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
        <div class="col-md-6 section1" >

            <p class="subtitle2" style="color:<?php echo (($missingFields) and in_array("school_logo",$missingFields))?"Red":"" ?>"
               ><?php echo (($missingFields) and in_array("school_logo",$missingFields))?"Please select a Logo":"Upload your Logo" ?></p>
                  <div class="forlogo">

                  <div class="preview">
                  <div class="preview2">
                  <i class="fa fa-picture-o fa-3x icon" ></i><br><span class="icon2">Logo Preview</span>
                  </div>
                  </div>

               <div class="fileupload btn btn-primary1 " >
                   <span style="color:#ffcc00">Select Logo</span>
                   <input id="uploadbtn" type="file" class="upload " name="school_logo" style="" />
               </div>

               </div>

               <br>

               <p class="subtitle2" style="color:<?php echo (($missingFields) and (in_array("school_color_1", $missingFields) or 
                       in_array("school_color_2", $missingFields)))?"Red":"" ?>">
                           <?php echo (($missingFields) and (in_array("school_color_1", $missingFields) or 
                       in_array("school_color_2", $missingFields)))?"Please repick Your Colors":"Pick Your Colors" ?></p>
                <div class="subtitle">Be sure to select two different colors besides white</div>
                <div class="forcolor">

                 <input name="school_color_1" type="color" class="color" required id="picker1"> 
                  <input name="school_color_2" type="color" class="color" required id="picker2">
                  </div>

        </div>

            <div class="col-md-6 section2" style="background: green">
        <p class="subtitle2 ">Fill Out School Profile</p>


        <input type="text" class="form-control " style="color: 
            <?php if($missingFields)echo (in_array("school_name",$missingFields))?"Red":"green" ?>"
            placeholder="School Name" name="school_name"
            value="<?php if($missingFields)echo $_POST['school_name'] ?>" >       

        <br>

        <input type="text" class="form-control" placeholder="School Abbreviation" name="school_abbr" 
               style="color:<?php if($missingFields)echo (in_array("school_abbr",$missingFields))?"Red":"green" ?>"
               value="<?php if($missingFields)echo $_POST['school_abbr'] ?>">       
        <br>


        <input type="tel" class="form-control" placeholder="School Phone Number" name="school_phone" 
               style="color:<?php if($missingFields)echo (in_array("school_phone",$missingFields))?"Red":"green" ?>"
               value="<?php if($missingFields) echo $_POST['school_phone'] ?>">

        <br>

        <input type="email" class="form-control" placeholder="School Email"name="school_email" 
               style="color:<?php if($missingFields) echo (in_array("school_email",$missingFields))?"Red":"green" ?>"
               value="<?php if($missingFields) echo $_POST['school_email'] ?>">         
        
        <br>
        
        <textarea placeholder="School Address" class="form-control" cols="30" rows="3"
                  style="color:<?php if($missingFields)echo (in_array("school_address",$missingFields))?"Red":"green" ?>"
                  name="school_address" ><?php if($missingFields)echo $_POST['school_address'] ?></textarea>       

        <br>

        <div class="tab_wrap" >
            <div class="tabs" style="background: #333300; ">
            <ul>
                <li><a name="tab" id="tab_1" href="javascript:void(0)" style="color:white" onClick="tabs(1)" class="active">JS1</a></li>
                <li><a name="tab" id="tab_2" href="javascript:void(0)" style="color:white" onClick="tabs(2)">JS2</a></li>
                <li><a name="tab" id="tab_3" href="javascript:void(0)" style="color:white" onClick="tabs(3)">JS3</a></li>
                <li><a name="tab" id="tab_4" href="javascript:void(0)" style="color:white" onClick="tabs(4)">SS1</a></li>
                <li><a name="tab" id="tab_5" href="javascript:void(0)" style="color:white" onClick="tabs(5)">SS2</a></li>
                <li><a name="tab" id="tab_6" href="javascript:void(0)" style="color:white" onClick="tabs(6)">SS3</a></li>
            </ul>
        </div>

        <div name="tab_content" id="tab_content_1" class="tab_content active">
            <input type="text" class="textb" name="school_js1_first" 
                   style="color:<?php if($missingFields)echo (in_array("school_js1_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_js1_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js1_last" 
                  style="color:<?php if($missingFields)echo (in_array("school_js1_last",$missingFields))?"Red":"green" ?>"
                  value="<?php if($missingFields)echo $_POST["school_js1_last"] ?>" />
        </div>
        <div name="tab_content" id="tab_content_2" class="tab_content">
         <input type="text" class="textb" name="school_js2_first" 
                style="color:<?php if($missingFields)echo (in_array("school_js2_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_js2_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js2_last" 
                  style="color:<?php if($missingFields)echo (in_array("school_js2_last",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_js2_last"] ?>" />
        </div>

        <div name="tab_content" id="tab_content_3" class="tab_content">
         <input type="text" class="textb" name="school_js3_first" 
                style="color:<?php if($missingFields)echo (in_array("school_js3_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_js3_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_js3_last" 
                  style="color:<?php if($missingFields)echo (in_array("school_js3_last",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_js3_last"] ?>" />
        </div>

        <div name="tab_content" id="tab_content_4" class="tab_content">
           <input type="text" class="textb" name="school_ss1_first" 
                  style="color:<?php if($missingFields)echo (in_array("school_ss1_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss1_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss1_last" 
                  style="color:<?php if($missingFields)echo (in_array("school_ss1_last",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss1_last"] ?>" />
        </div>

        <div name="tab_content" id="tab_content_5" class="tab_content">
           <input type="text" class="textb" name="school_ss2_first" 
                  style="color:<?php if($missingFields)echo (in_array("school_ss2_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss2_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss2_last"
                  style="color:<?php if($missingFields)echo (in_array("school_ss2_last",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss2_last"] ?>" />
        </div>

        <div name="tab_content" id="tab_content_6" class="tab_content">
         <input type="text" class="textb" name="school_ss3_first" 
                style="color:<?php if($missingFields)echo (in_array("school_ss3_first",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss3_first"] ?>" />
           <span class="spa">TO</span>
           <input type="text" class="textb"  name="school_ss3_last"
                  style="color:<?php if($missingFields)echo (in_array("school_ss3_last",$missingFields))?"Red":"green" ?>"
                   value="<?php if($missingFields)echo $_POST["school_ss3_last"] ?>" />
        </div>
        </div>





        
        
        </div>
            <br>
            <div style="clear: both">
                <input type="submit" name="create_school" class="btn btn-primary" value="Create Your School" />
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
