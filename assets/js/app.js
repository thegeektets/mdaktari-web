$(document).foundation()

$(document).ready(function(){
	
	var state = "open";
	var popup_state = "closed";
	var close_btn = "false";

	$(".edit_details_modal").hide();


	$( ".button_edit" ).click(
	  function() {
	  	$(".edit_details_modal").hide();
	   	$(this).parent().find(".edit_details_modal").css("display","block");
	  }
	);

	$( ".close_modal" ).click(
	  function() {
	    $(this).parents().find(".edit_details_modal").css("display","none");
	  
	  }
	);
	
	$('.close').click(function() {
		console.log('close alert');
		$(this).parents().find(".alert-box").css("display","none")
	});

});
   
