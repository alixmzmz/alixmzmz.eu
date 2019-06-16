
// masonry code 
$(document).ready(function() {
  $('#post-area').masonry({
    // options
    itemSelector : '.post',
    // options...
  isAnimated: true,
  animationOptions: {
    duration: 400,
    easing: 'linear',
    queue: false
  }
	
  });

	// hover code for index  templates
	$('#post-area .image').hover(
		function() {
			$(this).stop().fadeTo(300, 0.8);
		},
		function() {
			$(this).fadeTo(300, 1.0);
		}
	);

	// comment form values
	$("#comment-form input").focus(function () {
		var origval = $(this).val();	
		$(this).val("");	
		//console.log(origval);
		$("#comment-form input").blur(function () {
			if($(this).val().length === 0 ) {
				$(this).val(origval);	
				origval = null;
			}else{
				origval = null;
			};	
		});
	});
	
	// Create the dropdown base
	$("<select />").appendTo("#nav");
	
	// Create default option "Go to..."
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Go to..."
	}).appendTo("#nav select");
	
	// Populate dropdown with menu items
	$("#nav a").each(function() {
	 var el = $(this);
	 $("<option />", {
	     "value"   : el.attr("href"),
	     "text"    : el.text()
	 }).appendTo("#nav select");
	 
	});
	
	$("#nav select").change(function() {
		  window.location = $(this).find("option:selected").val();
	});
	
});

// clear text area
$('textarea.comment-input').focus(function() {
   $(this).val('');
});