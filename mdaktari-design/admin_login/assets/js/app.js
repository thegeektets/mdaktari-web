$(document).foundation();

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

	$('.home_menu').find('.logo_normal').css("display","none");
	
	$('.primary_menu').find('.logo_white').css("display","none");
	$('.primary_menu').find('hr').css("display","none");
	
	$(".offer_popup").hide();

	$( ".offer_item" ).click(
	  function() {
	  	$(".offer_popup").hide();
	   	$(this).parents('.offers_item').find(".offer_popup").css("display","block");
	  }
	);
	$( ".close_popup" ).click(
	  function() {
	  	console.log('close popup');
	    $(this).parents().find(".offer_popup").css("display","none");
	  	$(this).parents().find(".claims_popup").css("display","none");
	  }
	);
	$('.claims_popup').hide();

	$('.claims_box').click(function (){
		
		if($(this).prop('checked')){
			$(this).parents().find(".claims_popup").css("display","block");
		} else {
			$(this).parents().find(".claims_popup").css("display","none");
		}
		
	});
	
	$('.what_is_this').hide();

	$('.insure_input').click(function (){
		$('.what_is_this').hide();		
		$(this).parent().find(".what_is_this").css("display","block");
		
	});
	

});
   
