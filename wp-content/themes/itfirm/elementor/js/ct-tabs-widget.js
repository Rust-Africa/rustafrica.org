( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTTabsHandler = function( $scope, $ ) {
        $scope.find(".ct-tabs .ct-tabs-title .ct-tab-title, .ct-tab-form .ct-tabs-title .ct-tab-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".ct-tabs, .ct-tab-form");
            parent.find(".ct-tabs-content .ct-tab-content").slideUp(300);
            parent.find(".ct-tabs-title .ct-tab-title").removeClass('active');
            $(this).addClass("active");
            $(target).slideDown(300);
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_tabs.default', WidgetCTTabsHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_pricing.default', WidgetCTTabsHandler );
    } );
} )( jQuery );