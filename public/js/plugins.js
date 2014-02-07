// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());
(function($) {
    "use strict";

    $(function() {

        // jQuery Scroll Up / Back To Top Image
        $.scrollUp({
            scrollName:        'scrollUp', // Element ID
            topDistance:       '300',      // Distance from top before showing element (px)
            topSpeed:          300,        // Speed back to top (ms)
            animation:         'fade',     // Fade, slide, none
            animationInSpeed:  200,        // Animation in speed (ms)
            animationOutSpeed: 200,        // Animation out speed (ms)
            scrollText:        '',         // Text for element
            activeOverlay:     false      // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });

        // ScrollUp Placement
        /*$( window ).on( 'scroll', function() {

            // If the height of the document less the height of the document is the same as the
            // distance the window has scrolled from the top...
            if ( $( document ).height() - $( window ).height() === $( window ).scrollTop() ) {

                // Adjust the scrollUp image so that it's a few pixels above the footer
                $('#scrollUp').css( 'bottom', '80px' );

            } else {

                // Otherwise, leave set it to its default value.
                $('#scrollUp').css( 'bottom', '30px' );

            } // end if/else

        });*/

    });

} (jQuery) );
// Place any jQuery/helper plugins in here.
