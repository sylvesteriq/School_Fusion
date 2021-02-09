<!DOCTYPE html>
<html lang="en">
  <head>
	  <!----- end for logo ---> 
	   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Welcome to Aldrect</title>
       <link rel="stylesheet" href="css/style.css"/>
        <link href="fonts/ADAM.CG PRO.otf" rel='stylesheet' type='text/css'>
         <link href="fonts/CODE Bold.otf" rel='stylesheet' type='text/css'>
          <link href="fonts/CODE Light.otf" rel='stylesheet' type='text/css'>
           <link href="fonts/nougatine.ttf" rel='stylesheet' type='text/css'>
       <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
       <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media           queries -->      
       <!-- WARNING: Respond.js doesn't work if you view the page  
   
         via file:// --> 
           <!--[if lt IE 9]>      
              <script src="js/html5shiv.js"></script>
			  <script src="js/respond.js"></script>     
           <![endif]-->
           <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

	<script>
   
<!----- JQUERY FOR SLIDING NAVIGATION --->   
$(document).ready(function() {
  $('a[href*=#]').each(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname
    && this.hash.replace(/#/,'') ) {
      var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
      var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
       if ($target) {
         var targetOffset = $target.offset().top;

<!----- JQUERY CLICK FUNCTION REMOVE AND ADD CLASS "ACTIVE" + SCROLL TO THE #DIV--->   
         $(this).click(function() {
            $("#nav li a").removeClass("active");
            $(this).addClass('active');
           $('html, body').animate({scrollTop: targetOffset}, 1000);
           return false;
         });
      }
    }
  });

});


</script>

<style>
/*-------for navbar----*/
.sticky{
	position:fixed;
	width:100%;
	left:0;
	top:0;
	z-index:100;
	border-top:0;
	background-color:rgba(255,255,255,.95);
	  box-shadow:rgba(0,0,0,.8) 0px 8px 6px -6px;
}
/*-------for navbar----*/
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
 </head>