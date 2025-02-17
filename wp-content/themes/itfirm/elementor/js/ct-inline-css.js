( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTIlineHandler = function( $scope, $ ) {
    	
        var _inline_css = "<style>";
	    $scope.find('.ct-inline-css').each(function () {
	        var _this = $(this);
	        _inline_css += _this.attr("data-css") + " ";
	        _this.remove();
	    });
	    _inline_css += "</style>";
	    $('head').append(_inline_css);

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_button.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_text_editor.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_heading.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_fancy_box.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_history.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_particle_animate.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_contact_info.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_logo.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_menu.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_mailchimp_form.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_info_box.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_button_video.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_service_external.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_portfolio_carousel.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_pricing.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_icon_search.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_social.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_banner.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_service_grid.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_counter.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_team_grid.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_portfolio_grid.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_testimonial_carousel.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_blog_carousel.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_list_single.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_progressbar.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_steps.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_support_button.default', WidgetCTIlineHandler );
    } );
} )( jQuery );