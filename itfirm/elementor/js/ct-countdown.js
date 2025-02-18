( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTIlineHandler = function( $scope, $ ) {
        
        $('.ct-countdown').each(function () {
            var _this = $(this);
            var count_down = $(this).find('> div').data("count-down");
            setInterval(function () {
                var startDateTime = new Date().getTime();
                var endDateTime = new Date(count_down).getTime();
                var distance = endDateTime - startDateTime;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                var text_day = days !== 1 ? _this.attr('data-days') : _this.attr('data-day');
                var text_hour = hours !== 1 ? _this.attr('data-hours') : _this.attr('data-hour');
                var text_minu = minutes !== 1 ? _this.attr('data-minutes') : _this.attr('data-minute');
                var text_second = seconds !== 1 ? _this.attr('data-seconds') : _this.attr('data-second');

                var color_from = days !== 1 ? _this.attr('data-color-from') : _this.attr('data-color-from');
                var color_to = days !== 1 ? _this.attr('data-color-to') : _this.attr('data-color-to');

                days = days < 10 ? '0' + days : days;
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                seconds = seconds < 10 ? '0' + seconds : seconds;

                _this.html(''
                    + '<div class="countdown-item countdown-day"><div class="countdown-item-inner"><div class="countdown-amount">' + days + '</div><div class="countdown-period"><svg xmlns="http://www.w3.org/2000/svg" width="73" height="30" viewBox="0 0 73 30"><defs><linearGradient id="ct-countdown-gradient-icon" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color:' + color_from + ';stop-opacity:1" /><stop offset="100%" style="stop-color:' + color_to + ';stop-opacity:1" /></linearGradient></defs><path fill="url(#ct-countdown-gradient-icon)" d="M7.94,26.386a15.012,15.012,0,0,0-6.42,1.669L9.385,9.417c1.46-3.459,4.481-5.62,7.759-5.542H63.6s6.29-.2,8.347-2.071c0.02-.018.047,0,0.038,0.033-0.444,1.417-5.591,17.861-5.7,18.075-0.732,1.406-1.989,5.783-12.1,6.7Z"/></svg>' + text_day + '</div></div></div>'
                    + '<div class="countdown-item countdown-hour"><div class="countdown-item-inner"><div class="countdown-amount">' + hours + '</div><div class="countdown-period"><svg xmlns="http://www.w3.org/2000/svg" width="73" height="30" viewBox="0 0 73 30"><defs><linearGradient id="ct-countdown-gradient-icon" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color:' + color_from + ';stop-opacity:1" /><stop offset="100%" style="stop-color:' + color_to + ';stop-opacity:1" /></linearGradient></defs><path fill="url(#ct-countdown-gradient-icon)" d="M7.94,26.386a15.012,15.012,0,0,0-6.42,1.669L9.385,9.417c1.46-3.459,4.481-5.62,7.759-5.542H63.6s6.29-.2,8.347-2.071c0.02-.018.047,0,0.038,0.033-0.444,1.417-5.591,17.861-5.7,18.075-0.732,1.406-1.989,5.783-12.1,6.7Z"/></svg>' + text_hour + '</div></div></div>'
                    + '<div class="countdown-item countdown-minute"><div class="countdown-item-inner"><div class="countdown-amount">' + minutes + '</div><div class="countdown-period"><svg xmlns="http://www.w3.org/2000/svg" width="73" height="30" viewBox="0 0 73 30"><defs><linearGradient id="ct-countdown-gradient-icon" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color:' + color_from + ';stop-opacity:1" /><stop offset="100%" style="stop-color:' + color_to + ';stop-opacity:1" /></linearGradient></defs><path fill="url(#ct-countdown-gradient-icon)" d="M7.94,26.386a15.012,15.012,0,0,0-6.42,1.669L9.385,9.417c1.46-3.459,4.481-5.62,7.759-5.542H63.6s6.29-.2,8.347-2.071c0.02-.018.047,0,0.038,0.033-0.444,1.417-5.591,17.861-5.7,18.075-0.732,1.406-1.989,5.783-12.1,6.7Z"/></svg>' + text_minu + '</div></div></div>'
                    + '<div class="countdown-item countdown-second"><div class="countdown-item-inner"><div class="countdown-amount">' + seconds + '</div><div class="countdown-period"><svg xmlns="http://www.w3.org/2000/svg" width="73" height="30" viewBox="0 0 73 30"><defs><linearGradient id="ct-countdown-gradient-icon" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="stop-color:' + color_from + ';stop-opacity:1" /><stop offset="100%" style="stop-color:' + color_to + ';stop-opacity:1" /></linearGradient></defs><path fill="url(#ct-countdown-gradient-icon)" d="M7.94,26.386a15.012,15.012,0,0,0-6.42,1.669L9.385,9.417c1.46-3.459,4.481-5.62,7.759-5.542H63.6s6.29-.2,8.347-2.071c0.02-.018.047,0,0.038,0.033-0.444,1.417-5.591,17.861-5.7,18.075-0.732,1.406-1.989,5.783-12.1,6.7Z"/></svg>' + text_second + '</div></div></div>'
                );
            }, 100);
        });

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_countdown.default', WidgetCTIlineHandler );
    } );
} )( jQuery );