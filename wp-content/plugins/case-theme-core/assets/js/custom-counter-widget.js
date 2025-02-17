( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCustomCounterHandler = function( $scope, $ ) {
        $(".ct-counter .ct-counter-digit").each( function() {
            var options = {
                useEasing : true,
                useGrouping : ($(this).attr('data-grouping')) == '1' ? true : false,
                separator : $(this).attr('data-separator'),
                decimal : '.'
            };
            var digit = $(this).attr("data-digit");
            var prefix = $(this).attr("data-prefix");
            var suffix = $(this).attr("data-suffix");
            if (prefix != undefined) {
                options.prefix = prefix;
            }
            if (suffix != undefined) {
                options.suffix = suffix;
            }
            var random = 0;
            if ($(this).attr("data-type") == 'random') {
                random = Math.floor(Math.random() * digit * 2);
            }
            $(this).waypoint(
                function() {
                    var count = new countUp($(this).attr("id"), random,
                        digit, 0, 0, options);
                    count.start();
                }, {
                    offset : '95%',
                    triggerOnce : true
                }
            );
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/custom_counter.default', WidgetCustomCounterHandler );
    } );
} )( jQuery );