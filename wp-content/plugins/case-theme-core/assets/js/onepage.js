(function ($) {
    "use strict";

    if($('.is-one-page').length){
       $("html").addClass("pxl-onepage-wrap");
    }
    
    if (typeof(one_page_options) != "undefined") {
        one_page_options.speed = parseInt(one_page_options.speed);
        $('.is-one-page').on('click', function (e) {
            var _this = $(this);
            var _link = $(this).attr('href');
            var _id_data = e.currentTarget.hash;
            var _offset;
            var _data_offset = $(this).attr('data-onepage-offset');
            if(_data_offset) {
                _offset = _data_offset;
            } else {
                _offset = 0;
            }
            if ($(_id_data).length === 1) {
                var _target = $(_id_data);
                $('.ct-onepage-active').removeClass('ct-onepage-active');
                _this.addClass('ct-onepage-active');
                $('html, body').stop().animate({ scrollTop: _target.offset().top - _offset }, one_page_options.speed);   
                return false;
            } else {
                window.location.href = _link;
            }
            return false;
        });

        $.each($('.ct-header-elementor-sticky .is-one-page, .ct-header-main:not(.ct-header-mobile-main) .is-one-page'), function (index, item) {
            var target = $(item).attr('href');
            var el =  $(target);
            var _data_offset = $(item).attr('data-onepage-offset');
            var waypoint = new Waypoint({
                element: el[0],
                handler: function(direction) {
                    if(direction === 'down'){
                        $('.ct-onepage-active').removeClass('ct-onepage-active');
                        $(item).addClass('ct-onepage-active');
                    }
                    else if(direction === 'up'){
                        var prev = $(item).parent().prev().find('.is-one-page');
                        $(item).removeClass('ct-onepage-active');
                        if(prev.length > 0)
                            prev.addClass('ct-onepage-active');
                    }
                },
                offset: _data_offset,
            });

        });
    }

})(jQuery);