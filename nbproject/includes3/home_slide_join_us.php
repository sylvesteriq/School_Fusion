   <div id="slide3">
        <h1 class="whychooseus1">JOIN US</h1>
       
        <div class="main">
            <form action="includes/handle.php" class="regform" method="post" enctype="multipart/form-data">
         <div class="col-md-3"><div class="inner3 active1">Start Here</div></div>
        <div class="col-md-3"><div class="inner3 steps" id="2">Profile Details</div></div>
        
        <div class="col-md-3 "><div class="inner3 steps" id="3">Contact Details</div></div>
        <div class="col-md-3"><div class="inner3 steps" id="4">Terms and Conditions</div></div>
        
        <div id="first" class="forfieldsetdiv">
        <div class="inner4">
        <h2 class="title1">Become a member of SCHOOLFUSION today!</h2>
        <p class="subtitle1">Join the SCHOOLFUSION ecosystem and get connected.</p>
        <input id="next1" onClick="nextone()" type="button" value="START" class="next">
        </div>
        </div>
        
        <div id="second" class="forfieldsetdiv">
        <h2 class="title">Profile Details</h2>
        <p class="subtitle">Step 2</p>
        
        <div class="holder2">
        <div class="feedback2">Please Make Sure the following conditions are met:<br>
        <ul>
        <li> Make sure your school name isnt left empty.</li>
        <li> Make sure you have selected a valid location from the dropdown list.
        <li> Make sure you have inserted your Logo (you will see a preview of it)</li>
         <li> Make sure you have selected two different colors apart from white</li>
        
        </ul>
        </div>
        
        <input type="text" class="textfield" name="school_name" placeholder="Enter School Name" 
               value="" style="text-transform:capitalize;" required>
        <div class="feedback">Thanks For Choosing to Fuse with us.</div>
        </div>
        
        
        <div class="holder">
        <select class="options">
        <option>--Select Education--</option>
        <option>hi</option>
        <option>--Select Education--</option>
        <option>--Select Education--</option>
        <option>--Select Education--</option>
        <option>--Select Education--</option>
        </select>
        </div>
          <p class="subtitle2">Upload your Logo</p>
          <div class="forlogo">
        <input  id="logo" type="file"  name="school_logo" class="slogo" required/ ></div>
     <div class="preview"><i class="fa fa-picture-o fa-3x" ></i><br>Preview Logo Here</div>
       <br>
       
        <p class="subtitle2">Pick Your Colors</p>
        <div class="subtitle">Please make sure you select two different colors apart from white</div>
        <div class="forcolor">
       
         <input name="school_color_one" type="color" class="color" required id="picker1"> 
          <input name="school_color_two" type="color" class="color" required id="picker2">
          </div>
          
           <div class="forcolor">
            <input id="prev1" class="prev" onClick="prevone()" type="button" value="Prev">
        <input id="next2" class="next1" onClick="nexttwo()" type="button" value="Next">
        </div>
       
        </div>
        
        
        
            <div id="third" class="forfieldsetdiv" >
            <h1 class="whychooseus1">Contact Details</h1>
        <p class="subtitle">Step 3</p>
        <div class="holder2">
       <input type="tel" class="textfield" name="school_telephone" placeholder="Enter Phone Number "
              value="0" style="text-transform:capitalize;" required id="adminname"><br>
       
       <input type="email" class="textfield" name="school_email" placeholder="Enter Email Here"
              value="" style="text-transform:capitalize;" required>
       
       <textarea class="textfield2 textfield" placeholder="Enter Your Address" 
                 name="school_address" style="text-transform:capitalize"></textarea>
        </div>
        <div class="forcolor">
            <input id="prev2" onClick="prevtwo()" type="button" value="Prev" class="prev">
        <input id="next3" onClick="nextthree()" type="button" value="next" class="next1">
       </div>
        </div>
        
        
        <div id="fourth" class="forfieldsetdiv" >
        <div class="inner4">
        <h2 class="title">Our Terms</h2>
        <p class="subtitle">Step 4</p>
        
        <p> Please read our terms and conditions</p>
        
       <div class="forterms">
        <h3 class="termtitle" > First Term  <i class="fa fa-angle-double-down"></i></h3>
        
        <p class="termsub" > first term details</p>
        
        
        <h3 class="termtitle">  First Term  <i class="fa fa-angle-double-down"></i></h3>
        
        <p class="termsub"> first term details</p>
        
        
        
        <h3 class="termtitle">  First Term  <i class="fa fa-angle-double-down"></i></h3>
        
        <p class="termsub"> first term details</p>
        
        
        
        <h3 class="termtitle">  First Term  <i class="fa fa-angle-double-down"></i></h3>
        
        <p class="termsub"> first term details</p>
        
        </div>
        
        
        <p class="termsub">By clicking Submit You agree to our Terms and Conditions</p><br>
        <div class="forcolor">
            <input id="prev3" class="prev" onClick="prevthree()" type="button" value="Prev">
            <input id="submit" name="create_school" onClick="submit(event)" type="submit" value="I Agree" class="next2">
        </div>
       </div>
        </div>
        </form>
        </div>
        
        
    </div> 
	