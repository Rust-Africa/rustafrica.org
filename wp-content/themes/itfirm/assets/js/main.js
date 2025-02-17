;(function ($) {

    "use strict";

    /* ===================
     Page reload
     ===================== */
    var scroll_top;
    var window_height;
    var window_width;
    var scroll_status = '';
    var lastScrollTop = 0;
    $(window).on('load', function () {
        $(".ct-loader").fadeOut("slow");
        $(".ct-page-loading-bg").fadeOut("slow");
        window_width = $(window).width();
        itfirm_col_offset();
        itfirm_header_sticky();
        itfirm_scroll_to_top();
        itfirm_quantity_icon();
        itfirm_footer_fixed();
        itfirm_mouse_move();
        setTimeout(function(){
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('height', 'auto');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('overflow', 'visible');
            $('body:not(.elementor-editor-active) .ct-slick-slider').css('opacity', '1');
        }, 100);
    });
    $(window).on('resize', function () {
        window_width = $(window).width();
        itfirm_col_offset();
        itfirm_footer_fixed();
    });

    $(window).on('scroll', function () {
        scroll_top = $(window).scrollTop();
        window_height = $(window).height();
        window_width = $(window).width();
        if (scroll_top < lastScrollTop) {
            scroll_status = 'up';
        } else {
            scroll_status = 'down';
        }
        lastScrollTop = scroll_top;
        itfirm_header_sticky();
        itfirm_scroll_to_top();
    });

    $(document).on('click', '.ct-search-popup', function () {
        $('.ct-modal-search').addClass('open').removeClass('remove');
        $('body').addClass('ov-hidden');
        setTimeout(function(){
            $('.ct-modal-search .search-field').focus();
        },1000);
    });

    $(document).ready(function () {
        /* =================
         Menu Dropdown
         =================== */
        var $menu = $('#ct-header-elementor');
        $menu.find('.ct-nav-menu li').each(function () {
            var $submenu = $(this).find('> ul.sub-menu');
            if ($submenu.length == 1) {
                $(this).hover(function () {
                    if ($submenu.offset().left + $submenu.width() > $(window).width()) {
                        $submenu.addClass('back');
                    } else if ($submenu.offset().left < 0) {
                        $submenu.addClass('back');
                    }
                }, function () {
                    $submenu.removeClass('back');
                });
            }
        });

        /* =================
         Menu Mobile
         =================== */
        $('.ct-header-elementor-sticky').parents('body').addClass('header-sticky');
        
        $('.ct-main-navigation li.menu-item-has-children').append('<span class="ct-menu-toggle caseicon-angle-arrow-down"></span>');
        $('.ct-menu-toggle').on('click', function () {
            $(this).toggleClass('toggle-open');
            $(this).parent().find('> .sub-menu').toggleClass('submenu-open');
            $(this).parent().find('> .sub-menu').slideToggle();
        });

        $(".ct-main-menu li a.is-one-page").on('click', function () {
           $(this).parents('.ct-header-navigation').removeClass('navigation-open');
           $(this).parents('.ct-header-main').find('.btn-nav-mobile').removeClass('opened');
           $('.ct-menu-overlay').removeClass('active');
        });
        
        $("#ct-menu-mobile .open-menu").on('click', function () {
            $(this).toggleClass('opened');
            $('.ct-header-navigation').toggleClass('navigation-open');
            $('.ct-menu-overlay').toggleClass('active');
        });

        $(".ct-menu-close").on('click', function () {
            $(this).parents('.ct-header-navigation').removeClass('navigation-open');
            $('.ct-menu-overlay').removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('body').removeClass('ovhidden');
        });

        $(".ct-menu-overlay").on('click', function () {
            $(this).parents('#ct-header').find('.ct-header-navigation').removeClass('navigation-open');
            $(this).removeClass('active');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('body').removeClass('ovhidden');
        });

        if (window_width < 1199) {
            $('.ct-main-menu li.menu-item-has-children > a').on("click", function (e) {
                e.preventDefault();
                $(this).parent().find('> .sub-menu, > .children').toggleClass('submenu-open');
                $(this).parent().find('> .sub-menu, > .children').slideToggle();
                $(this).parent().find('> .ct-menu-toggle').toggleClass('toggle-open');
            });
        }

        /* ===================
         Search Toggle
         ===================== */
        $('.h-btn-form').click(function (e) {
            e.preventDefault();
            $('.ct-modal-contact-form').removeClass('remove').toggleClass('open');
        });

        setTimeout(function(){
            $('.ct-close, .ct-close .ct-icon-close').click(function (e) {
                e.preventDefault();
                $(this).parents('.ct-widget-cart-wrap').removeClass('open');
                $(this).parents('.ct-modal').addClass('remove').removeClass('open');
                $(this).parents('#page').find('.site-overlay').removeClass('open');
                $(this).parents('body').removeClass('ov-hidden');
            });
        }, 300);

        $('.ct-hidden-sidebar-overlay, .ct-widget-cart-overlay').click(function (e) {
            e.preventDefault();
            $(this).parent().toggleClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Video 16:9 */
        $('.entry-video iframe').each(function () {
            var v_width = $(this).width();

            v_width = v_width / (16 / 9);
            $(this).attr('height', v_width + 35);
        });

        /* Video Light Box */
        $('.ct-video-button, .el-btn-video, .ct-slider-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
        
        /* ====================
         Scroll To Top
         ====================== */
        $('.scroll-top, .ct-wg-backtotop-inner').click(function () {
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });

        $('.ct-wg-backtotop-inner').parents('body').find('.scroll-top').hide();

        /* =================
        Add Class
        =================== */
        $('.wpcf7-select').parent().addClass('wpcf7-menu');
        

        /* =================
         The clicked item should be in center in owl carousel
         =================== */
        var $owl_item = $('.owl-active-click');
        $owl_item.children().each(function (index) {
            $(this).attr('data-position', index);
        });
        $(document).on('click', '.owl-active-click .owl-item > div', function () {
            $owl_item.trigger('to.owl.carousel', $(this).data('position'));
        });

        /* Widget Search */
        $('.widget-title').parents('.widget_search').addClass('title-actived');
        
        /* Select */
        $('select:not([id*="ui-id-"]):not(#billing_country):not(#shipping_country):not(#billing_state):not(.gt_selector):not(.wpforms-form):not(.variations_form)').each(function () {
            $(this).niceSelect();
        });

        /* Search */
        $('.ct-modal-close, .ct-modal-overlay').on('click', function () {
            $(this).parent().removeClass('open').addClass('remove');
            $(this).parents('body').removeClass('ov-hidden');
        });
        $(document).on('click', function (e) {
            if (e.target.className == 'ct-modal ct-modal-search open')
                $('.ct-modal-search').removeClass('open').addClass('remove');
            if (e.target.className == 'ct-hidden-sidebar open')
                $('.ct-hidden-sidebar').removeClass('open');
        });

        /* Hidden Sidebar */
        $(".ct-sidebar-icon").on('click', function (e) {
            e.preventDefault();
            $('.ct-hidden-sidebar-wrap').toggleClass('open');
            //$(this).parents('body').addClass('ov-hidden');
        });

        $(".ct-hidden-close").on('click', function (e) {
            e.preventDefault();
            $(this).parents('.ct-hidden-sidebar-wrap').removeClass('open');
            $(this).parents('body').removeClass('ov-hidden');
        });

        /* Cart Sidebar */
        $(".h-btn-cart, .btn-nav-cart").on('click', function (e) {
            e.preventDefault();
            $('.ct-widget-cart-wrap').toggleClass('open');
            $('.ct-header-navigation').removeClass('navigation-open');
            $('#ct-menu-mobile .open-menu').removeClass('opened');
            $('.ct-menu-overlay').removeClass('active');
            $(this).parents('body').addClass('ov-hidden');
        });

        /* Year Copyright */
        var _year_footer = $(".ct-footer-year"),
            _year_clone = _year_footer.parents(".site").find('.ct-year');
        _year_clone.after(_year_footer.clone());
        _year_footer.remove();
        _year_clone.remove();

        /* Comment Reply */
        $('.comment-reply a').append( '<i class="caseicon-angle-arrow-right"></i>' );

        /* Same Height */
        $('.same-height').matchHeight();

        /* Animate Time */
        $('.animate-time').each(function () {
            var eltime = 100;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 100;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        $('.case-animate-time').each(function () {
            var eltime = 0;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .slide-in-container > .wow').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 0;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        /* Page Title Scroll Opacity */
        var fadeStart=140,fadeUntil=440,fading = $('.ct-pagetitle .container');
        $(window).bind('scroll', function(){
            var offset = $(document).scrollTop()
                ,opacity=0
            ;
            if( offset<=fadeStart ){
                opacity=1;
            }else if( offset<=fadeUntil ){
                opacity=1-offset/fadeUntil;
            }
            fading.css('opacity',opacity);
        });

        /* Main Header */
        $('.ct-header-fixed-transparent').parents('.ct-header-elementor-main').addClass('ct-header-fixed-transparent-wrap');

        $('.btn-video').parent('.ct-gallery-item').addClass('ct-gallery-video');

        /* Service */
        $( ".ct-service-carousel3 .grid-item-inner" ).hover(
          function() {
            $( this ).find('.item--meta').slideToggle(220);
          }, function() {
            $( this ).find('.item--meta').slideToggle(220);
          }
        );

        /* Portfolio */
        $( ".ct-portfolio-carousel5 .grid-item-inner" ).hover(
          function() {
            $( this ).find('.item--backdrop').slideToggle(220);
          }, function() {
            $( this ).find('.item--backdrop').slideToggle(220);
          }
        );

        $('.ct-social-box').on('click', function () {
            $(this).parent().toggleClass('active');
        });

        $('.ct-wg-fixed-right').parents('.site').find('#ct-header-elementor').addClass('ct-header-section-below');

        /* Start Icon Bounce */
        var boxEls = $('.el-bounce');
        $.each(boxEls, function(boxIndex, boxEl) {
            loopToggleClass(boxEl, 'bounce-active');
        });

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(function () {
                    counter++;
                    return counter == 2;
                }, function () {
                    counter = 0;
                    el.removeClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Deactivate', 1000);
            } else {
                waitFor(function () {
                    counter++;
                    return counter == 3;
                }, function () {
                    counter = 0;
                    el.addClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Activate', 1000);
            }
        }

        function waitFor(condition, callback, message, time) {
            if (message == null || message == '' || typeof message == 'undefined') {
                message = 'Timeout';
            }
            if (time == null || time == '' || typeof time == 'undefined') {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function() {
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */

        /* Pricing */
        $(".ct-pricing-tab-active .ct-pricing-tab-item").on('click', function () {
            $(this).parent().find('.ct-pricing-tab-item').removeClass('active');
            $(this).addClass('active');
        });
        $(".ct-pricing-tab-active .title-tab-monthly").on('click', function () {
            $(this).parents('.ct-pricing').find('.ct-pricing-monthly').removeClass('ct-pricing-hide');
            $(this).parents('.ct-pricing').find('.ct-pricing-year').addClass('ct-pricing-hide');
        });
        $(".ct-pricing-tab-active .title-tab-year").on('click', function () {
            $(this).parents('.ct-pricing').find('.ct-pricing-year').removeClass('ct-pricing-hide');
            $(this).parents('.ct-pricing').find('.ct-pricing-monthly').addClass('ct-pricing-hide');
        });

        /* Fancybox */
        $('.ct-fancy-box-layout6').each(function () {
            $(this).hover(function () {
                $(this).parents('.elementor-row').find('.ct-fancy-box-layout6').removeClass('ct--item-active');
                $(this).parents('.elementor-container').find('.ct-fancy-box-layout6').removeClass('ct--item-active');
                $(this).addClass('ct--item-active');
            });
        });

        /* Showcase */
        $('.item--link').each(function () {
            $(this).hover(function () {
                $(this).parents('.item--image').find('.item--link').removeClass('active');
                $(this).addClass('active');
            });
        });

        /* Animate Time Button */
        $('.btn-nina, .btn-outline-gradient').each(function () {
            var eltime = 0.045;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('.pxl--btn-text > span').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 's');
                eltime = eltime + 0.045;
            });
        });

    });

    function itfirm_header_sticky() {
        var offsetTop = $('#ct-header-elementor').outerHeight();
        var offsetTopAnimation = offsetTop + 200;
        if($('#ct-header-elementor').hasClass('is-sticky')) {
            if (scroll_top > offsetTopAnimation) {
                $('.ct-header-elementor-sticky').addClass('h-fixed');
                $('.ct-header-mobile').addClass('mobile-sticky');
            } else {
                $('.ct-header-elementor-sticky').removeClass('h-fixed');   
                $('.ct-header-mobile').removeClass('mobile-sticky');   
            }
        }

        /* Button Support */
        if (scroll_top > 680) {
            $('.ct-support-button').removeClass('active');
        }
    }

    /* ====================
     Mouse Move
     ====================== */
    function itfirm_mouse_move() {
        if ($('#ct-mouse-move').hasClass('ct-mouse-move')) {
            var follower, init, mouseX, mouseY, positionElement, timer;

            follower = document.getElementById('ct-mouse-move');

            mouseX = (event) => {
                return event.clientX;
            };

            mouseY = (event) => {
                return event.clientY;
            };

            positionElement = (event) => {
                var mouse;
                mouse = {
                    x: mouseX(event),
                    y: mouseY(event)
                };

                follower.style.top = mouse.y + 'px';
                return follower.style.left = mouse.x + 'px';
            };

            timer = false;

            window.onmousemove = init = (event) => {
                var _event;
                _event = event;
                    return timer = setTimeout(() => {
                    return positionElement(_event);
                }, 0);
            };
        }
    }

    /* =================
     Column Offset
     =================== */
    function itfirm_col_offset() {
        var w_vc_row_lg = ($('#content').width() - 1140) / 2;
        var w_vc_row_xl = ($('#content').width() - 1760) / 2;
        if (window_width > 1200) {
            $('body:not(.rtl) .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');
            $('body:not(.rtl) .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');

            $('body:not(.rtl) .col-offset-left-xl.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_xl + 'px');
            $('body:not(.rtl) .col-offset-right-xl.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_xl + 'px');

            $('.rtl .col-offset-left.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_lg + 'px');
            $('.rtl .col-offset-right.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_lg + 'px');

            $('.rtl .col-offset-left-xl.elementor-column > .elementor-widget-wrap').css('padding-right', w_vc_row_xl + 'px');
            $('.rtl .col-offset-right-xl.elementor-column > .elementor-widget-wrap').css('padding-left', w_vc_row_xl + 'px');
        }

        /* Page Title Offset */
        var w_ptitle = (($('#ct-pagetitle').width() - 1170) / 2) + 175;
        if (window_width > 1200) {
            $('body:not(.rtl) #ct-pagetitle .ct-pagetitle-image').css('left', w_ptitle + 'px');
            $('body:not(.rtl) #ct-pagetitle .ct-pagetitle-highlight').css('width', w_ptitle + 'px');
        }
    }

    /* =================
     Footer Fixed
     =================== */
    function itfirm_footer_fixed() {
        setTimeout(function(){
            var h_footer = $('.fixed-footer .site-footer-custom').outerHeight() - 1;
            $('.fixed-footer .site-content').css('margin-bottom', h_footer + 'px');
        }, 300);
    }

    /* ====================
     Scroll To Top
     ====================== */
    function itfirm_scroll_to_top() {
        if (scroll_top < window_height) {
            $('.scroll-top').addClass('off').removeClass('on');
        }
        if (scroll_top > window_height) {
            $('.scroll-top').addClass('on').removeClass('off');
        }
    }

    /* ====================
     WooComerce Quantity
     ====================== */
    function itfirm_quantity_icon() {
        $('#content .quantity').append('<span class="quantity-icon"><i class="quantity-down">-</i><i class="quantity-up">+</i></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    $( document ).ajaxComplete(function() {
       itfirm_quantity_icon();
    });

})(jQuery);