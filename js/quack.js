// Quacky jQuery
// GA Track Event with #event id. 
jQuery(document).ready(function() {
    jQuery("[id^='event']").each(function() {
        var href = jQuery(this).attr("href");
        var target = jQuery(this).attr("target");
        var text = jQuery(this).text();
        jQuery(this).click(function(event) { // when someone clicks these links
            event.preventDefault(); // don't open the link yet
            ga('send', 'event', "Links", "Clicked", href, false); // create a custom event
            setTimeout(function() { // now wait 300 milliseconds...
                window.open(href,(!target?"_self":target)); // ...and open the link as usual
            },1);
        });
    });
});
jQuery(function($) {
		var windowwidth = $(window).width();
		var margin = windowwidth - $('#content').width();
		var right = (margin / 2) + 15;
		$('.container-wide').css({'width':windowwidth, 'right':right, 'position':'relative', 'padding':'0 15px'});
	$(window).resize(function(){
		if ($(window).width() >= 999){
			var windowwidth = $(window).width();
			var margin = windowwidth - $('#content').outerWidth();
			var right = (margin / 2) + 15;
			$('.container-wide').css({'width':windowwidth, 'right':right, 'position':'relative', 'padding':'0 15px'});
		}
		else 
		{
			$('.container-wide').css({'width':'100%', 'right':'0', 'position':'relative', 'padding':'0 15px'});
		}
	});
});(jQuery) 
