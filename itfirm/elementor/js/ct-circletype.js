( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTCircletypeHandler = function( $scope, $ ) {
    	
        new CircleType(document.getElementById('ct-circle-type'));

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_banner.default', WidgetCTCircletypeHandler );
    } );
} )( jQuery );