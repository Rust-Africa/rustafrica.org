(function($) {
    "use strict";
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.waypoint = function($element, callback, options) {
            if( $element.length <= 0) return;
            const defaultOptions = {
              offset: '100%',
              triggerOnce: true
            }; 
            options = jQuery.extend(defaultOptions, options);
            const correctCallback = function () {
              const element = this.element || this,
                result = callback.apply(element, arguments);

              // If is Waypoint new API and is frontend
              if (options.triggerOnce && this.destroy) {
                this.destroy();
              }
              return result;
            };
             
            return $element.elementorWaypoint(correctCallback, options);
        }
    });

    $('.scroll-top').click(function () {
        $('html').addClass('pxl-onepage-wrap');
    });
 
}(jQuery));