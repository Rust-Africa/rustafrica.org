<?php
$default_settings = [
    'wg_title' => '',
    'portfolio_content' => '',
    'value_label' => '',
    'value_text' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$has_icon = ! empty( $settings['ct_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['ct_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
?>
<div class="ct-portfolio-detail1">
    <?php if(!empty($wg_title)) : ?>
        <h4 class="wg-title"><?php echo esc_attr($wg_title); ?></h4>
    <?php endif; ?>
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
    <div class="ct-portfolio-value">
        <div class="ct-portfolio-cost">
            <span><?php echo esc_attr($value_label); ?></span>
            <?php echo esc_attr($value_text); ?>
        </div>
        <div class="ct-portfolio-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
    </div>
</div>