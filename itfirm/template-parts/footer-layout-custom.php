<?php
$footer_layout_custom = itfirm_get_opt('footer_layout_custom');
$custom_footer = itfirm_get_page_opt('custom_footer', 'false');
$footer_layout_custom_page = itfirm_get_page_opt('footer_layout_custom');
if($custom_footer && !empty($footer_layout_custom_page) ) {
    $footer_layout_custom = $footer_layout_custom_page;
}
?>
<footer id="colophon" class="site-footer-custom">
    <?php if(!empty($footer_layout_custom)) :  ?>
        <div class="footer-custom-inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php $post = get_post($footer_layout_custom);
                        if (!is_wp_error($post) && $post->ID == $footer_layout_custom && class_exists('Case_Theme_Core') && function_exists('ct_print_html')){
                            $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_layout_custom );
                            ct_print_html($content);
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>