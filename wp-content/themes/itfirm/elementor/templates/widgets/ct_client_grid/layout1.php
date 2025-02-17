<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'clients' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if ( ! empty($item_btn_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href',$item_btn_link['url'] );

    if ($item_btn_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ($item_btn_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<?php if(isset($clients) && !empty($clients) && count($clients)): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-client-grid1 <?php echo esc_attr($settings['style']); ?>">
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($clients as $key => $client):
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $client['client_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $client['client_link']['url'] );

                    if ( $client['client_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $client['client_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
            	if(!empty($client['client_logo']['id'])) { ?>
                    <div class="<?php echo esc_attr($item_class); ?>">
                        <div class="ct-client--image <?php if(!empty($client['client_logo_hover']['id'])) { echo 'img-hover-active'; } ?>">
                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                <?php if(!empty($client['client_logo']['id'])) :
                                    $img          = ct_get_image_by_size( array(
                                        'attach_id'  => $client['client_logo']['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload ct-client--imgmain'
                                    ) );
                                    $thumbnail    = $img['thumbnail']; ?>
                                    <?php echo ct_print_html($thumbnail); ?>
                                <?php endif; ?>
                                <?php if(!empty($client['client_logo_hover']['id'])) :
                                    $img_hover          = ct_get_image_by_size( array(
                                        'attach_id'  => $client['client_logo_hover']['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload'
                                    ) );
                                    $thumbnail_hover    = $img_hover['thumbnail'];?>
                                    <div class="ct-client--imghover">
                                        <?php echo ct_print_html($thumbnail_hover); ?>
                                    </div>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php endforeach; ?>

            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
