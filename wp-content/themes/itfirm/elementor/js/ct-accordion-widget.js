( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTAccordionHandler = function( $scope, $ ) {
        $scope.find(".ct-accordion .ct-accordion-item .ct-ac-title").on("click", function(e){
            e.preventDefault();
            var target = $(this).data("target");
            var parent = $(this).parents(".ct-accordion");
            var active_items = parent.find(".ct-ac-title.active");
            $.each(active_items, function (index, item) {
                var item_target = $(item).data("target");
                if(item_target != target){
                    $(item).removeClass("active");
                    $(this).parent().removeClass("active");
                    $(item_target).slideUp(400);
                }
            });
            $(this).parent().toggleClass("active");
            $(this).toggleClass("active");
            $(target).slideToggle(400);
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_accordion.default', WidgetCTAccordionHandler );
    } );
} )( jQuery );