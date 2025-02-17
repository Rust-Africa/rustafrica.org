<?php
/**
 * Template part for displaying default header layout
 */
$header_layout = itfirm_get_opt('header_layout');
$header_layout_sticky = itfirm_get_opt('header_layout_sticky');

$custom_header = itfirm_get_page_opt('custom_header', 'false');

$header_layout_page = itfirm_get_page_opt('header_layout');
if($custom_header && !empty($header_layout_page) ) {
    $header_layout = $header_layout_page;
}

$header_layout_sticky_page = itfirm_get_page_opt('header_layout_sticky');
if($custom_header && !empty($header_layout_sticky_page) ) {
    $header_layout_sticky = $header_layout_sticky_page;
}

$logo_m = itfirm_get_opt( 'logo_m', array( 'url' => get_template_directory_uri().'/assets/images/logo.png', 'id' => '' ) );

if(class_exists('\Elementor\Plugin')){
    $id = get_the_ID();
    if ( is_singular() && \Elementor\Plugin::$instance->documents->get( $id )->is_built_with_elementor() ) {
        $classes = 'ct-header-content';
    } else {
        $classes = 'container';
    }
} else {
    $classes = 'container';
}
?>
<header id="ct-header-elementor" class="is-sticky">
	<?php if(isset($header_layout) && !empty($header_layout)) : ?>
		<div class="ct-header-elementor-main">
		    <div class="<?php echo esc_attr($classes); ?>">
		        <div class="row">
		        	<div class="col-12">
			            <?php $post_main = get_post($header_layout);
	                    if (!is_wp_error($post_main) && $post_main->ID == $header_layout && class_exists('Case_Theme_Core') && function_exists('ct_print_html')){
	                        $content_main = \Elementor\Plugin::$instance->frontend->get_builder_content( $header_layout );
	                        ct_print_html($content_main);
	                    } ?>
	                </div>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
	<?php if(isset($header_layout_sticky) && !empty($header_layout_sticky)) : ?>
		<div class="ct-header-elementor-sticky">
		    <div class="container">
		        <div class="row">
		            <?php $post_sticky = get_post($header_layout_sticky);
	                    if (!is_wp_error($post_sticky) && $post_sticky->ID == $header_layout_sticky && class_exists('Case_Theme_Core') && function_exists('ct_print_html')){
	                        $content_sticky = \Elementor\Plugin::$instance->frontend->get_builder_content( $header_layout_sticky );
	                        ct_print_html($content_sticky);
	                    } ?>
		        </div>
		    </div>
		</div>
	<?php endif; ?>
    <div class="ct-header-mobile">
        <div id="ct-header" class="ct-header-main">
            <div class="container">
                <div class="row">
                    <div class="ct-header-branding">
                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                    </div>
                    <div class="ct-header-navigation">
                        <nav class="ct-main-navigation">
                            <div class="ct-main-navigation-inner">
                                <?php if ($logo_m['url']) { ?>
                                    <div class="ct-logo-mobile">
                                        <?php get_template_part( 'template-parts/header-branding' ); ?>
                                    </div>
                                <?php } ?>
                                <?php itfirm_header_mobile_search(); ?>
                                <?php get_template_part( 'template-parts/header-menu' ); ?>
                            </div>
                        </nav>
                    </div>
                    <div class="ct-menu-overlay"></div>
                </div>
            </div>
            <div id="ct-menu-mobile">
                <div class="ct-mobile-meta-item btn-nav-mobile open-menu">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>