<?php
$default_settings = [
    'title' => '',
    'price' => '',
    'button_text' => '',
    'button_link' => '',
    'content_list' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
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
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-pricing-single ct-pricing-single1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="pricing--meta">
        <?php if(!empty($image['id'])) : ?>
            <div class="item--image bg-image" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
        <?php endif; ?>
        <h5 class="pricing--title"><?php echo esc_attr($title); ?></h5>
        <?php if ( $has_icon ) : ?>
            <div class="pricing--icon icon-psb">
                <?php if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                    else: ?>
                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none">
            <path stroke-width="0" d="M0 100 L100 0 L200 100"></path>
        </svg>
    </div>
    <div class="pricing--holder">
        <div class="pricing--price"><?php echo esc_attr($price); ?></div>
        <?php if(isset($settings['content_list']) && !empty($settings['content_list']) && count($settings['content_list'])): ?>
            <ul class="pricing--feature">
                <?php
                    foreach ($settings['content_list'] as $key => $ct_list): ?>
                    <li><i class="fa fa-check"></i><?php echo ct_print_html($ct_list['content'])?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <?php if(!empty($button_text)) : ?>
            <div class="pricing--button">
                <a class="btn btn-primary" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_attr($button_text); ?></a>
            </div>
        <?php endif; ?>
    </div>
</div>