( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTToggleHandler = function( $scope, $ ) {
        $scope.find(".ct-toggle .ct-toggle-item .ct-toggle-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            $(this).toggleClass("active");
            $(target).slideToggle(400);
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_toggle.default', WidgetCTToggleHandler );
    } );
} )( jQuery );