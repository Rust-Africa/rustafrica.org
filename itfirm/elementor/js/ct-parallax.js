( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTCounterHandler = function( $scope, $ ) {
        elementorFrontend.waypoint($scope.find('.ct-block-parallax'), function () {
            $(this).parallaxScroll({
                friction: 0.5,
            });
        }, {
            offset: '95%',
            triggerOnce: true
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_image.default', WidgetCTCounterHandler );
    } );
} )( jQuery );