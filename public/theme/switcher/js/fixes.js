
$(document).ready(function() {	
		
	
	
			 $(function($) {
			  let url = window.location.href;
			  $('nav ul li a').each(function() {
				if (this.href === url) {
					$(this).addClass('active');
				  	 $(this).parents('li').find('a.nav-link').addClass('active');
				}
			  });
			});
			
	
		   // Close switcher when clicked outside


	$(document).click(function() {
	var container = $(".demo_changer");
	if (!container.is(event.target) && !container.has(event.target).length) {
	container.removeClass('active').css( "left" ,"-300px");
	}
	});
	
		
   
	 
	//Force active link on home pages

	$(function() {
		var loc = window.location.href; // returns the full URL
		if (/index.php/.test(loc) ||/index-video.php/.test(loc)){
			$('#footer-divider').removeClass('white');
		}
	});
	$(function() {
		var loc = window.location.href; // returns the full URL
		if (/index.php/.test(loc) ){
			$('.home a.nav-link').addClass('active');
		}
	});


    //reload page on option changer
	
		(function($) {
			$(document).ready( function() {
				$('#nav-options').change(function() {
					location.reload();
					if (window.location.href.indexOf('?') > -1) {
					window.location.href = window.location.pathname;
				}
								
				});
			});
		})(jQuery);
		
		
		
			
			


}); // end document ready
		
				
	
	// Cookie to remember what options are selected
	$(function() {
		var navValue = localStorage.getItem("navValue");
		if (navValue != null) {
			$("#nav-options").val(navValue);
		}

		$("#nav-options").on("change", function() {
			localStorage.setItem("navValue", $(this).val());
		});
		
	//Force boxed if page has boxed string
		 if (window.location.href.indexOf("?boxed") > -1)  {
				$("#nav-options").val("boxed").change();	
			};
			
			//Force full if page has full string
		 if (window.location.href.indexOf("?full") > -1)  {
				$("#nav-options").val("full").change();	
			};
		})
		
		
	
	
	
	// selected option will show on page load
	$(document).ready(function() {
		if ($('#nav-options').val() == "boxed") {
			$('body').addClass('boxed');
		}
		  else {
		  $('body').append('');
		 
		}
		});



			


