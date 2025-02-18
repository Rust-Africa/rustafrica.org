( function( $ ) {
    $.sep_grid_refresh = function (){
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

            $('.ct-service-grid1').each(function () {
                $(this).find('.grid-item-inner').hover(function () {
                    $(this).parents('.elementor-element').find('.grid-item-inner').removeClass('active');
                    $(this).addClass('active');
                });
            });

        });
    }

    /* Load More */
    $('.ct-grid').each(function () {
        var _this_wrap = $(this);
        var html_id = _this_wrap.attr('id');

        $(this).find('.ct-load-more').on('click', function (e) {
            e.preventDefault();
            var loadmore = $(this).data('loadmore');
            var _this = $(this).parents(".ct-grid");
            var layout_type = _this.data('layout');
            loadmore.paged = parseInt(_this.data('start-page')) +1;
            var _this_click = $(this);
            _this_click.find('span').attr('class', 'btn btn-grid-loadmore loading-active');
            $.ajax({
                url: main_data.ajax_url,
                type: 'POST',
                data: {
                    action: 'itfirm_load_more_post_grid',
                    settings: loadmore
                }
            })
            .done(function (res) {
                if(res.status == true) {
                    var html = $("<div></div>").html(res.data.html);
                    html.find(".grid-item").addClass("ct-animated");
                    html = html.html();
                    _this.find('.ct-grid-inner').append(html);
                    _this.data('start-page', res.data.paged);
                    if(layout_type == 'masonry'){
                        _this.imagesLoaded(function() {
                            $.sep_grid_refresh();
                        });
                    }
                    if(res.data.paged >= res.data.max){
                        _this_click.hide();
                    }
                }
            })
            .fail(function (res) {
                return false;
            })
            .always(function () {
                _this_click.find('span').attr('class', 'btn btn-grid-loadmore');
                return false;
            });
        });

        /* Pagination */
        $(document).on('click', '.ct-grid-pagination .ajax a.page-numbers', function(e) {
            e.preventDefault();
            var _this = $(this).parents(".ct-grid");
            var loadmore = _this.find(".ct-grid-pagination").data('loadmore');
            var query_vars = _this.find(".ct-grid-pagination").data('query');
            var layout_type = _this.data('layout');
            var paged = $(this).attr('href');
            paged = paged.replace('#', '');
            loadmore.paged = parseInt(paged);
            query_vars.paged = parseInt(paged);
            // reload pagination
            $.ajax({
                url: main_data.ajax_url,
                type: 'POST',
                data: {
                    action: 'itfirm_get_pagination_html',
                    query_vars: query_vars
                }
            }).done(function (res) {
                if(res.status == true){
                    _this.find(".ct-grid-pagination").html(res.data.html);
                }
            }).fail(function (res) {
                return false;
            }).always(function () {
                return false;
            });
            // load post
            $.ajax({
                url: main_data.ajax_url,
                type: 'POST',
                data: {
                    action: 'itfirm_load_more_post_grid',
                    settings: loadmore
                }
            }).done(function (res) {
                if(res.status == true){
                    _this.find('.ct-grid-inner .grid-item').remove();
                    _this.find('.ct-grid-inner').append(res.data.html);
                    _this.data('start-page', res.data.paged);
                    if(layout_type == 'masonry'){
                        _this.imagesLoaded(function() {
                            $.sep_grid_refresh();
                            $('html, body').animate({scrollTop: _this.offset().top - 300}, 'slow');
                            $('.woocommerce-add-to-cart a.button').append( '<i class="flaticon-next"></i>' );
                            $('.woocommerce-add-to-cart a.button').addClass('btn btn-animate');
                        });
                    }
                }
            }).fail(function (res) {
                return false;
            }).always(function () {
                return false;
            });
            return false;
        });
        
    });

} )( jQuery );