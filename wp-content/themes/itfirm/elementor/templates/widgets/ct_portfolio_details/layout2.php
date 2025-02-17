<?php
$default_settings = [
    'social' => '',
    'portfolio_content' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$has_icon = ! empty( $settings['ct_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['ct_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
?>
<div class="ct-portfolio-detail2">
    <?php if(isset($portfolio_content) && !empty($portfolio_content) && count($portfolio_content)): ?>
        <ul>
            <?php foreach ($portfolio_content as $key => $value):
                $label = isset($value['label']) ? $value['label'] : '';
                $content = isset($value['content']) ? $value['content'] : '';
                ?>
                <li>
                    <?php if(!empty($label)) : ?>
                        <label><?php echo esc_attr($label); ?></label>
                    <?php endif; ?>

                    <?php if(!empty($content)) : ?>
                        <span><?php echo esc_attr($content); ?></span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <?php if($social == 'show') : ?>
        <?php itfirm_socials_share_default(); ?>
    <?php endif; ?>
</div>