 
jQuery(document).ready(function() {
 
    jQuery("#event").each(function() {
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