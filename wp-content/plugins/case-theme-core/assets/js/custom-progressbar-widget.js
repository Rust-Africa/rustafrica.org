( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCustomProgressBarHandler = function( $scope, $ ) {
        $scope.find(".progress-bar").each(function(){
            $(this).waypoint(function() {
                $(this).progressbar();
            },{
                offset: '95%',
                triggerOnce: true
            });
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/custom_progressbar.default', WidgetCustomProgressBarHandler );
    } );
} )( jQuery );