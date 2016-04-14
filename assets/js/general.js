/*---------------------------------------------------------------------*/
var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);	

;(function($){
/*---------------------------------------------------------------------*/
$(document).ready( function(){
/*---------------------------------------------------------------------*/	
checkWindow();

	//Banner Slider
	if($('#slider .item').length > 1){
		 $("#slider").owlCarousel({
		animateOut: '',
	autoplay:true,
   autoplayTimeout:5000,
       loop:true,
	   nav:true,
	   dots:true,
    margin:0,
    items:1  
		});
	
	
	$("#slider .item img").each(function () {	
		
			var imgSrc = $(this).attr('src');
			$(this).parent('.item').css('background-image', 'url(' + imgSrc + ')');
		
	})

	}
	
	$('#header').scrollToFixed();		
	$(function() {
                $('.nav a').bind('click',function(event){
                    var $anchor = $(this);
                    
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top - $("#header").height()
                    }, 1500,'easeInOutExpo');

                    event.preventDefault();
                });
            }); 
	/*---------------------------------------------------------------------*/
	
			
			
		$('#trigger-text-us').click(function() { 
			$('body').append('<div id="text-us-modal"><div class="close-me">CLOSE [x]</div><iframe src="http://info.heywire.com/l/95232/2015-12-02/f81dz" width="100%" height="670" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe></div>');
			$('#text-us-modal').fadeToggle();
			});
			
			$('body').on('click', '.close-me', function() {
				$(this).parent().remove();
			});
				
});

$(window).resize(function() {
	checkWindow();	
});

})(jQuery);

function checkWindow(){
	if($(window).width() > 767){
		$("body").removeClass("mobile").addClass("desktop");	
	}
	else {
		$("body").removeClass("desktop").addClass("mobile");	
	}
	if($(window).width() > 767 && $(window).width() < 1024){
		$("body").addClass("ipad");	
	}
	else {
		$("body").removeClass("ipad");	
	}
}

	
/* ==========================================================================
Window Scroll
========================================================================== */
jQuery(window).scroll(function () {

    'use strict';

    if ($(document).scrollTop() >= 130) {
        $('.logoAndNavBar').addClass('tinyheader');
    } else {
        $('.logoAndNavBar').removeClass('tinyheader');
    }
    if ($(document).scrollTop() >= 35) {
        $('.logoAndNavBar').addClass('tiny');
        $('.headerTopStrip').addClass('hide-top-header');
    } else {
        $('.logoAndNavBar').removeClass('tiny');
        $('.headerTopStrip').removeClass('hide-top-header');
    }


});


