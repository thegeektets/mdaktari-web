$(document).foundation()

<<<<<<< HEAD
$(function() {
    $('span.stars').stars();
});

$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
}

=======
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
$(document).ready(function(){
	
	var state = "open";
	var popup_state = "closed";
	var close_btn = "false";

<<<<<<< HEAD

=======
>>>>>>> 124a899e7f8a92e0b84e2d72ad7713a1ea6e0d33
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
   
