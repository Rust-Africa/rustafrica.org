<?php if(!empty($settings['pxl_id'])) : 
    $offset = !empty($settings['offset']) ? $settings['offset'] : '0'; ?>
    <div class="pxl-scroll-wrap <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <a href="<?php echo esc_attr($settings['pxl_id']); ?>" class="pxl-scroll-to-section" data-offset="<?php echo esc_attr($offset); ?>">
            <i class="flaticon-arrow-point-to-right"></i>
        </a>
    </div>
<?php endif; ?>