<?php
$default_settings = [
    'steps' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($steps) && !empty($steps) && count($steps)): ?>
    <div class="ct-steps-layout1">
        <?php
            foreach ($steps as $key => $ct_step): 
                $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                if ( ! empty( $ct_step['btn_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $ct_step['btn_link']['url'] );

                    if ( $ct_step['btn_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $ct_step['btn_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                ?>
            <div id="<?php echo esc_attr($html_id).'-'.$key ?>" class="ct--item">
                <div class="ct-inline-css"  data-css="
                    <?php if( !empty($ct_step['box_number_color']) ) : ?>
                        .ct-steps-layout1 #<?php echo esc_attr($html_id).'-'.$key ?> .ct--meta .ct--number {
                            background-color: <?php echo esc_attr($ct_step['box_number_color']); ?>;
                        }
                    <?php endif; ?>
                    <?php if( !empty($ct_step['box_number_circle_color']) ) : ?>
                        .ct-steps-layout1 #<?php echo esc_attr($html_id).'-'.$key ?> .ct--meta .ct--number:before {
                            border-color: <?php echo esc_attr($ct_step['box_number_circle_color']); ?>;
                        }
                    <?php endif; ?>">
                </div>
                <div class="ct--holder">
                    <div class="ct--holder-inner">
                        <h5 class="ct--title el-empty">
                            <?php echo ct_print_html($ct_step['title'])?>
                        </h5>
                        <div class="ct--content el-empty">
                            <?php echo ct_print_html($ct_step['content'])?>
                        </div>
                        <?php if(!empty($ct_step['btn_text'])) : ?>
                            <div class="ct--button <?php echo esc_attr($ct_animate); ?>">
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?> class="btn btn-circle-text btn-ctext"><?php echo ct_print_html($ct_step['btn_text'])?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="ct--meta">
                    <div class="ct--meta-inner">
                        <div class="ct--number el-empty">
                            <?php echo ct_print_html($ct_step['number'])?>
                        </div>
                        <?php if ( !empty($ct_step['icon_image']['id']) ) : 
                            $img_icon  = ct_get_image_by_size( array(
                                'attach_id'  => $ct_step['icon_image']['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail'];
                            ?>
                            <div class="ct--icon">
                                <?php echo ct_print_html($thumbnail_icon); ?>
                            </div>
                        <?php endif; ?>
                        <div class="ct--arrow"><i class="flaticon-next"></i></div>
                        <div class="ct--line"></div>
                    </div>
                </div>
           </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
