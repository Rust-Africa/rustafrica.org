( function( $ ) {
    /**
     * @param $scope The Widget wrapper element as a jQuery element
     * @param $ The jQuery alias
     */
    var WidgetCTIlineHandler = function( $scope, $ ) {
    	
        setTimeout(function(){
            $('.elementor > .elementor-element, .elementor-editor-active .elementor-section-wrap > .elementor-element').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-parents"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-parents"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });

            $('.elementor > .elementor-element').each(function () {
                var _el_button = $(this).find(".elementor-container .el-move-child"),
                    _el_button_remove = $(this).find(".elementor-widget-wrap .el-move-child"),
                    _row_button = $(this).parents('.site');
                _row_button.before(_el_button.clone());
                _el_button_remove.remove();
            });

            $('.elementor-inner-section').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-inner"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-inner"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });
            
            $('.ct-contact-form-layout1.style2 .input-filled').each(function () {
                var icon_input = $(this).find(".input-icon, label"),
                    control_wrap = $(this).find('.wpcf7-form-control');
                control_wrap.before(icon_input.clone());
                icon_input.remove();
            });
        }, 200);

    };

    // Make sure you run this code under Elementor.
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_social.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_particle_animate.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_square_animate.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_contact_form.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_text_below.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_support_button.default', WidgetCTIlineHandler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/ct_background.default', WidgetCTIlineHandler );
    } );
} )( jQuery );