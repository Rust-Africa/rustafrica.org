( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetLineChartHandler = function( $scope, $ ) {
        elementorFrontend.waypoint($scope.find('#ct-line-chart'), function () {
            var data_chart = $(this).data();
            new Chart($(this), {
              type: 'line',
              data: data_chart.datasets,
              responsive: true,
              options: {
                title: {
                  display: true,
                  text: ''
                },
                legend: {
                  labels: {
                    fontSize: 14,
                    fontFamily: 'Roboto',
                    fontColor: '#d5d5d5',
                    fontStyle: '500',
                  }
                },
                scales: {
                  yAxes: [{ticks: {fontSize: 14, fontFamily: "'Roboto', sans-serif", fontColor: '#d5d5d5', fontStyle: '500'}}],
                  xAxes: [{ticks: {fontSize: 14, fontFamily: "'Roboto', sans-serif", fontColor: '#d5d5d5', fontStyle: '500'}}]
                }
              }
            });
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_line_chart.default', WidgetLineChartHandler );
    } );
} )( jQuery );