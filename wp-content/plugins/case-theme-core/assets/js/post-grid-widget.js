( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    function sep_grid_refresh(){
        $('.ct-grid-masonry').each(function () {
            var iso = new Isotope(this, {
                itemSelector: '.grid-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.grid-sizer',
                },
                containerStyle: null,
                stagger: 30,
                sortBy : 'name',
            });

            var filtersElem = $(this).parent().find('.grid-filter-wrap');
            filtersElem.on('click', function (event) {
                var filterValue = event.target.getAttribute('data-filter');
                iso.arrange({filter: filterValue});
            });

            var filterItem = $(this).parent().find('.filter-item');
            filterItem.on('click', function (e) {
                filterItem.removeClass('active');
                $(this).addClass('active');
            });

            var filtersSelect = $(this).parent().find('.select-filter-wrap');
            filtersSelect.change(function() {
                var filters = $(this).val();
                iso.arrange({filter: filters});
            });

            var orderSelect = $(this).parent().find('.select-order-wrap');
            orderSelect.change(function() {
                var e_order = $(this).val();
                if(e_order == 'asc') {
                    iso.arrange({sortAscending: false});
                }
                if(e_order == 'des') {
                    iso.arrange({sortAscending: true});
                }
            });

        });
    }
    var WidgetPostMasonryHandler = function( $scope, $ ) {
        // $.fn.sep_grid_refresh = function () {
        //     $('.ct-grid-masonry').each(function () {
        //         var iso = new Isotope(this, {
        //             itemSelector: '.grid-item',
        //             percentPosition: true,
        //             masonry: {
        //                 columnWidth: '.grid-sizer',
        //             },
        //             containerStyle: null,
        //             stagger: 30,
        //             sortBy : 'name',
        //         });
        //
        //         var filtersElem = $(this).parent().find('.grid-filter-wrap');
        //         filtersElem.on('click', function (event) {
        //             var filterValue = event.target.getAttribute('data-filter');
        //             iso.arrange({filter: filterValue});
        //         });
        //
        //         var filterItem = $(this).parent().find('.filter-item');
        //         filterItem.on('click', function (e) {
        //             filterItem.removeClass('active');
        //             $(this).addClass('active');
        //         });
        //
        //         var filtersSelect = $(this).parent().find('.select-filter-wrap');
        //         filtersSelect.change(function() {
        //             var filters = $(this).val();
        //             iso.arrange({filter: filters});
        //         });
        //
        //         var orderSelect = $(this).parent().find('.select-order-wrap');
        //         orderSelect.change(function() {
        //             var e_order = $(this).val();
        //             if(e_order == 'asc') {
        //                 iso.arrange({sortAscending: false});
        //             }
        //             if(e_order == 'des') {
        //                 iso.arrange({sortAscending: true});
        //             }
        //         });
        //
        //     });
        // };
        $('.ct-grid-masonry').imagesLoaded(function(){
            sep_grid_refresh();
        });

        $('.ct-grid').each(function () {
            var _this = $(this);
            var html_id = _this.attr('id');
            var _variable = _this.data('loadmore');
            if (typeof _variable !== 'undefined') {
                // pageNum[html_id] = parseInt(_variable.startPage) + 1;
                // total[html_id] = parseInt(_variable.total);
                // max[html_id] = parseInt(_variable.maxPages);
                // perpage[html_id] = parseInt(_variable.perpage);
                // nextLink[html_id] = _variable.nextLink;
                // masonry[html_id] = _variable.layout;

                $('#' + html_id + ' .ct-load-more').click(function () {
                    var _this_click = $(this);
                    var layout = _this.data('layout');
                    var page_num = parseInt(_this.data('start-page')) +1;
                    var max_pages = parseInt(_this.data('max-pages'));
                    var total = parseInt(_this.data('total'));
                    var perpage = parseInt(_this.data('perpage'));
                    var next_link = _this.data('next-link');
                    _this_click.find('i').attr('class', 'fa fa-refresh fa-spin');
                    setTimeout(function () {
                        $.get(next_link, function () {
                        })
                            .done(function (data) {
                                if (layout === 'masonry') {
                                    var items = $(data).find('#' + html_id + ' .ct-grid-masonry > .grid-item');
                                    var time = 0.4;
                                    items.each(function () {
                                        $(this).addClass('ct-animated');
                                        $(this).find('.grid-item-inner').css('animation-duration', time + 's');
                                        time = time + 0.15;
                                    });
                                    $(items).imagesLoaded(function(){
                                        $('#' + html_id).children('.ct-grid-masonry').append(items);
                                        sep_grid_refresh();
                                        $(document).find('.filter-item.active').trigger('click');
                                    });
                                }
                                page_num++;
                                if (page_num <= max_pages) {
                                    if (next_link.indexOf('/page/') > -1) {
                                        next_link = next_link.replace(/\/page\/[0-9]?/, '/page/' + page_num);
                                    }
                                    else {
                                        next_link = next_link.replace(/paged=[0-9]?/, 'paged=' + page_num);
                                    }
                                } else {
                                    _this_click.remove();
                                }
                                _this.data("start-page", page_num);
                            })
                            .always(function () {
                                _this_click.find('i').attr('class', 'fa fa-plus');
                            });
                    }, 100);
                });
            }

            var _pagination_variable = $('#' + html_id).find('.ct-grid-pagination');
            if(typeof _pagination_variable !== 'undefined' || _pagination_variable.length > 0){
                $('#' + html_id + ' .ct-grid-pagination').on('click','.page-numbers',function (e) {
                    e.preventDefault();
                    var _this_page = $(this);
                    if(_this_page.hasClass('current')){
                        return;
                    }
                    var _p_link = _this_page.attr('href');
                    setTimeout(function () {
                        $.get(_p_link, function () {
                        })
                            .done(function (data) {
                                if (masonry[html_id] === 'masonry') {
                                    var _contents = $(data).find('#' + html_id + ' .ct-grid-inner');
                                    var _pagination = $(data).find('#' + html_id + ' .ct-grid-pagination');
                                    var items = $(data).find('#' + html_id + ' .ct-grid-masonry > .grid-item');
                                    var time = 0.4;
                                    items.each(function () {
                                        $(this).addClass('ct-animated');
                                        $(this).find('.grid-item-inner').css('animation-duration', time + 's');
                                        time = time + 0.15;
                                    });
                                    $(items).imagesLoaded(function(){
                                        $('#' + html_id).children('.ct-grid-masonry').html(_contents.html());
                                        $('#' + html_id).find('.ct-grid-pagination').html(_pagination.html());
                                        document.getElementById(html_id).scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
                                        $.fn.ct_grid_refresh();
                                        $(document).find('.filter-item.active').trigger('click');
                                        $('#' + html_id).find('.grid-item-inner').addClass('wpb_start_animation animated');
                                    });
                                }
                            })
                            .always(function () {
                            });
                    }, 100);
                });
            }
        });
    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/post_grid.default', WidgetPostMasonryHandler );
    } );
} )( jQuery );
