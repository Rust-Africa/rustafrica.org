( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetPieChartHandler = function( $scope, $ ) {
        elementorFrontend.waypoint($scope.find('.ct-piechart .percentage'), function () {
            var track_color = $(this).data('track-color');
            var bar_color = $(this).data('bar-color');
            var line_width = $(this).data('line-width');
            var chart_size = $(this).data('size');

            var options = {
                animate: 2000,
                lineWidth: line_width,
                barColor: bar_color,
                trackColor: track_color,
                scaleColor: false,
                lineCap: '',
                rotate: 0,
                size: chart_size
            };
            $(this).easyPieChart(options);
        }, {
            offset: '95%',
            triggerOnce: true
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_pie_chart.default', WidgetPieChartHandler );
    } );
} )( jQuery );