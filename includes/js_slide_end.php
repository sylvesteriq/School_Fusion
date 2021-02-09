<script>
$(document).ready(function() {
	
	var feedback = $(".feedback");
	feedback.hide();
	
	var feedback2 = $(".feedback2");
	feedback2.hide();
	
	var phonefeed = $(".phonefeed");
	phonefeed.hide();
	
	var stickynavtop = $(".navbar").offset().top;
	
	var stickynav = function(){
		var scrolltop = $(window).scrollTop();
		
		if (scrolltop > stickynavtop){
			$(".navbar").addClass('sticky');
		}else{
			$(".navbar").removeClass('sticky');
		}
	};
	stickynav();
	
	$(window).scroll(function(){
		stickynav();
	});
	

   $("#next1").click(function(){
	   $("#2").removeClass("steps");
	   $("#2").addClass("active2");
	    $("#first").hide();
	   $("#second").show();
   });
    $("#prev1").click(function(){
	   $("#2").removeClass("active2");
	   $("#2").addClass("steps");
	   $("#second").hide();
	   $("#first").show();
   });
   
 <!--for the next button in the profile stage---!>
  $("#next2").click(function(){
	  var schoolname = $(".textfield");
	  var location = $(".options");
	  var logo = $(".slogo");
	  var color1 = $("#picker1");
	  var color2 = $("#picker2");
	
	  
	  if (schoolname.val() != "" && location.val() != "--Select Education--" && logo.val() != "" && color1.val() != "#ffffff" && color2.val() != "#ffffff" && color1.val() != color2.val()){
		  
		  $(".feedback2").fadeOut(2000,function(){
		    $("#3").removeClass("steps");
	   $("#3").addClass("active2");
	   $("#second").hide();
	   $("#third").show();	
		  })
	 
	  
	   }
	    else{
	 $(".feedback2").fadeIn(3000)
	   };
   });
   <!--for the next button in the profile stage---!>
   
$("#prev2").click(function(){
	   $("#3").removeClass("active2");
	   $("#3").addClass("steps");
	   $("#second").show();
	   $("#third").hide();
   });
   
   <!--for the next button in the contact stage---!>  
$("#next3").click(function()
{
	 $("#4").removeClass("steps");
	   $("#4").addClass("active3");
	   $("#fourth").show();
	   $("#third").hide();
});
		  
<!--for the next button in the contact stage---!>
$("#prev3").click(function(){
	   $("#4").removeClass("active3");
	   $("#4").addClass("steps");
   });

$("#logo").on('change',function(){
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
$("#telephone2").hide();
$(".showthree").hide();
$(".closetwo").hide();
$("#three").hide();
$("#twoone").hide();
$("#threeone").hide();
$(".showtwo").click(function(){
	$("#telephone2").fadeIn(500);
	$(".closetwo").fadeIn(900);
	$(".showthree").fadeIn(900);
	
}

	);
$(".showtwoone").click(function(){
	$("#twoone").fadeIn(500);
}

	);
$(".showthreeone").click(function(){
	$("#threeone").fadeIn(500);
}

	);
$(".closetwo").click(function(){
	$("#telephone2").fadeOut(500);
	$(".closetwo").fadeOut(300);
	$(".showthree").fadeOut(300);
});
$(".closetwoone").click(function(){
	$("#twoone").fadeOut(500);
});
$(".closethreeone").click(function(){
	$("#threeone").fadeOut(500);
});
$(".closethree").click(function(){
	$("#three").fadeOut(500);
});
$(".showthree").click(function(){
	$("#three").fadeIn(500);
}
	);

});
</script>
