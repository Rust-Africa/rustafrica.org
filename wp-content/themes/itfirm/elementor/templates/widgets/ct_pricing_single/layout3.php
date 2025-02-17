<?php
$default_settings = [
    'title' => '',
    'price' => '',
    'time' => '',
    'currency' => '',
    'button_text' => '',
    'button_link' => '',
    'content_list' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
    'pricing_popular' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="ct-pricing-single ct-pricing-single3 <?php echo esc_attr($ct_animate); if($pricing_popular == 'yes') { echo 'ct-pricing-popular'; } ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="pricing--meta">
        <h5 class="pricing--title"><?php echo esc_attr($title); ?></h5>
    </div>
    <?php if ( !empty($settings['icon_image']['id']) ) : ?>
        <div class="pricing--icon">
            <?php $img_icon  = ct_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
            echo ct_print_html($thumbnail_icon); ?>
            <svg xmlns="http://www.w3.org/2000/svg" width="370" height="158" viewBox="0 0 370 158">
                <path d="M-5.77,2.868s31.724-8.09,38.683,51.578,38.366,85.3,82.055,76.194,76.659,12.619,86.744,16.411S264.7,179.6,303.7,124.779s49.7-20.2,66.817-26.961,24.617-10.55,24.617-10.55V-185.859L-3.425-189.377Z"/>
            </svg>
        </div>
    <?php endif; ?>
    <div class="pricing--holder">
        <div class="pricing--desc el-empty"><?php echo esc_attr($settings['desc']); ?></div>
        <div class="pricing--price el-empty">
            <cite><?php echo esc_attr($currency); ?></cite>
            <?php echo esc_attr($price); ?>
            <span><?php echo esc_attr($time); ?></span>        
        </div>
        <?php if(!empty($button_text)) : ?>
            <div class="pricing--button">
                <a class="btn btn-gradient-rotate" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($button_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>