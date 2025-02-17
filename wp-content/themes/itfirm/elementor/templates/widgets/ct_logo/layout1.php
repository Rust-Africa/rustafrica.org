<?php 
$default_settings = [
    'logo' => '',
    'logo_max_height' => '',
    'logo_link' => '',
    'style' => '',
    'skew_gradient_from' => '',
    'skew_gradient_to' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$img  = ct_get_image_by_size( array(
    'attach_id'  => $logo['id'],
    'thumb_size' => 'full',
) );
$thumbnail    = $img['thumbnail'];
if ( ! empty( $logo_link['url'] ) ) {
    $widget->add_render_attribute( 'logo_link', 'href', $logo_link['url'] );

    if ( $logo_link['is_external'] ) {
        $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
    }

    if ( $logo_link['nofollow'] ) {
        $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
    }
}
$html_id = ct_get_element_id($settings);

if(!empty($logo['id'])) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-logo <?php echo esc_attr($ct_animate); ?> <?php echo esc_attr($style); ?>">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($skew_gradient_from) && !empty($skew_gradient_to) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-logo.style3::before {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($skew_gradient_from); ?>), to(<?php echo esc_attr($skew_gradient_to); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($skew_gradient_from); ?>, <?php echo esc_attr($skew_gradient_to); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($skew_gradient_from); ?>, <?php echo esc_attr($skew_gradient_to); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($skew_gradient_from); ?>, <?php echo esc_attr($skew_gradient_to); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($skew_gradient_from); ?>, <?php echo esc_attr($skew_gradient_to); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($skew_gradient_from); ?>, <?php echo esc_attr($skew_gradient_to); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($skew_gradient_from); ?>', endColorStr='<?php echo esc_attr($skew_gradient_to); ?>');
                }
            <?php endif; ?>">
        </div>
        <?php if ( ! empty( $logo_link['url'] ) ) { ?><a <?php ct_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>><?php } ?>
            <?php if ( ! empty( $logo['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
        <?php if ( ! empty( $logo_link['url'] ) ) { ?></a><?php } ?>
    </div>
<?php endif; ?>