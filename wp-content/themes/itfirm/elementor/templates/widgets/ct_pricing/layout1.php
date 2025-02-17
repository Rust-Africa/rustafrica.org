<?php
$html_id = ct_get_element_id($settings);
$default_settings = [
    'tab_title_monthly' => '',
    'tab_label_monthly' => '',
    'tab_title_year' => '',
    'tab_label_year' => '',
    'col_monthly' => '',
    'col_year' => '',
    'content_monthly' => '',
    'content_year' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-pricing ct-pricing-tab ct-pricing-layout1 <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) { echo 'ct-pricing-tab-active'; } ?>">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-pricing-layout1 .ct-pricing-meta {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?>), to(<?php echo esc_attr($settings['color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
            #<?php echo esc_attr($html_id) ?>.ct-pricing-layout1 .ct-pricing-button .btn {
                background-image: -webkit-linear-gradient(90deg, <?php echo esc_attr($settings['color_gr_from']); ?> 0%, <?php echo esc_attr($settings['color_gr_to']); ?> 50%, <?php echo esc_attr($settings['color_gr_from']); ?>);
                background-image: -moz-linear-gradient(90deg, <?php echo esc_attr($settings['color_gr_from']); ?> 0%, <?php echo esc_attr($settings['color_gr_to']); ?> 50%, <?php echo esc_attr($settings['color_gr_from']); ?>);
                background-image: -ms-linear-gradient(90deg, <?php echo esc_attr($settings['color_gr_from']); ?> 0%, <?php echo esc_attr($settings['color_gr_to']); ?> 50%, <?php echo esc_attr($settings['color_gr_from']); ?>);
                background-image: -o-linear-gradient(90deg, <?php echo esc_attr($settings['color_gr_from']); ?> 0%, <?php echo esc_attr($settings['color_gr_to']); ?> 50%, <?php echo esc_attr($settings['color_gr_from']); ?>);
                background-image: linear-gradient(90deg, <?php echo esc_attr($settings['color_gr_from']); ?> 0%, <?php echo esc_attr($settings['color_gr_to']); ?> 50%, <?php echo esc_attr($settings['color_gr_from']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
        <?php endif; ?>">
    </div>

    <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) : ?>
        <div class="ct-pricing-tab-title">
            <?php if($tab_title_monthly) : ?>
                <div class="ct-pricing-tab-item title-tab-monthly active"><?php echo ct_print_html($tab_title_monthly); ?><span class="el-empty"><?php echo esc_attr($tab_label_monthly); ?></span></div>
            <?php endif; ?>
            <?php if($tab_title_year) : ?>
                <div class="ct-pricing-tab-item title-tab-year"><?php echo ct_print_html($tab_title_year); ?><span class="el-empty"><?php echo esc_attr($tab_label_year); ?></span></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="ct-pricing-tab-content">
        <?php if(!empty($content_monthly)) : ?>
            <div class="ct-pricing-body ct-pricing-monthly pricing-<?php echo esc_attr($col_monthly); ?>-column">
                <?php foreach ($content_monthly as $key => $value):
                $popular = isset($value['popular']) ? $value['popular'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $price = isset($value['price']) ? $value['price'] : '';
                $time = isset($value['time']) ? $value['time'] : '';
                $button_text = isset($value['button_text']) ? $value['button_text'] : '';
                $button_link = isset($value['button_link']) ? $value['button_link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'button_link', 'value', $key );
                if ( ! empty( $button_link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $button_link['url'] );

                    if ( $button_link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $button_link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                $feature = isset($value['feature']) ? $value['feature'] : '';
                ?>
                <div class="ct-pricing-item <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                    <div class="ct-pricing-item-inner">
                        <div class="item-popular el-empty"><?php echo esc_attr($popular); ?></div>
                        <div class="ct-pricing-top">
                            <h3 class="ct-pricing-title el-empty"><?php echo ct_print_html($title); ?></h3>
                            <div class="ct-pricing-subtitle el-empty"><?php echo esc_attr($sub_title ); ?></div>
                        </div>
                        <div class="ct-pricing-meta">
                            <div class="ct-pricing-price el-empty"><?php echo ct_print_html($price); ?></div>
                            <div class="ct-pricing-time el-empty"><?php echo ct_print_html($time); ?></div>
                        </div>
                        <ul class="ct-pricing-features-list">
                            <?php if(!empty($feature)):
                                $pricing_feature = json_decode($feature, true);
                                foreach ($pricing_feature as $value): ?>
                                    <li class="<?php echo ct_print_html($value['class_pricing']); ?>"><i class="caseicon-check"></i><?php echo ct_print_html($value['content_pricing']); ?></li>
                                <?php endforeach;
                            endif; ?>
                        </ul>
                        <?php if(!empty($button_text)) : ?>
                            <div class="ct-pricing-button">
                                <a class="btn btn-default" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($content_year)) : ?>
            <div class="ct-pricing-body ct-pricing-year <?php if(!empty($tab_title_monthly) || !empty($tab_title_year)) { echo 'ct-pricing-hide'; } ?> pricing-<?php echo esc_attr($col_year); ?>-column">
                <?php foreach ($content_year as $key_y => $value_y):
                $popular = isset($value_y['popular']) ? $value_y['popular'] : '';
                $title = isset($value_y['title']) ? $value_y['title'] : '';
                $sub_title = isset($value_y['sub_title']) ? $value_y['sub_title'] : '';
                $price = isset($value_y['price']) ? $value_y['price'] : '';
                $time = isset($value_y['time']) ? $value_y['time'] : '';
                $button_text = isset($value_y['button_text']) ? $value_y['button_text'] : '';
                $button_link_y = isset($value_y['button_link_y']) ? $value_y['button_link_y'] : '';
                $link_key_y = $widget->get_repeater_setting_key( 'button_link', 'value_y', $key_y );
                if ( ! empty( $button_link_y['url'] ) ) {
                    $widget->add_render_attribute( $link_key_y, 'href', $button_link_y['url'] );

                    if ( $button_link_y['is_external'] ) {
                        $widget->add_render_attribute( $link_key_y, 'target', '_blank' );
                    }

                    if ( $button_link_y['nofollow'] ) {
                        $widget->add_render_attribute( $link_key_y, 'rel', 'nofollow' );
                    }
                }
                $link_attributes_y = $widget->get_render_attribute_string( $link_key_y );
                $feature = isset($value_y['feature']) ? $value_y['feature'] : '';
                ?>
                <div class="ct-pricing-item">
                    <div class="ct-pricing-item-inner">
                        <div class="item-popular el-empty"><?php echo esc_attr($popular); ?></div>
                        <div class="ct-pricing-top">
                            <h3 class="ct-pricing-title el-empty"><?php echo ct_print_html($title); ?></h3>
                            <div class="ct-pricing-subtitle el-empty"><?php echo esc_attr($sub_title ); ?></div>
                        </div>
                        <div class="ct-pricing-meta">
                            <div class="ct-pricing-price el-empty"><?php echo ct_print_html($price); ?></div>
                            <div class="ct-pricing-time el-empty"><?php echo ct_print_html($time); ?></div>
                        </div>
                        <ul class="ct-pricing-features-list">
                            <?php if(!empty($feature)):
                                $pricing_feature = json_decode($feature, true);
                                foreach ($pricing_feature as $value_y): ?>
                                    <li class="<?php echo ct_print_html($value_y['class_pricing']); ?>"><i class="caseicon-check"></i><?php echo ct_print_html($value_y['content_pricing']); ?></li>
                                <?php endforeach;
                            endif; ?>
                        </ul>
                        <?php if(!empty($button_text)) : ?>
                            <div class="ct-pricing-button">
                                <a class="btn" <?php echo implode( ' ', [ $link_attributes_y ] ); ?>><?php echo esc_attr($button_text); ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>