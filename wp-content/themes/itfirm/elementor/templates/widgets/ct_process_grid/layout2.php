<?php
$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$is_new = \Elementor\Icons_Manager::is_migration_allowed();

$t_gradient_color_from = itfirm_get_opt('gradient_color', ['from' => '#006cff']);
$p_gradient_color = itfirm_get_page_opt('p_gradient_color');
if(!empty($p_gradient_color['from'])) {
   $t_gradient_color_from['from'] = $p_gradient_color['from'];
}

$t_gradient_color_to = itfirm_get_opt('gradient_color', ['to' => '#1227b8']);
if(!empty($p_gradient_color['to'])) {
   $t_gradient_color_to['to'] = $p_gradient_color['to'];
}

$html_id = ct_get_element_id($settings);

?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
    <div class="ct-grid ct-process-grid ct-process-grid2">
        <div class="ct-item--divider bg-image"></div>
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list as $key => $value):
    			$number = isset($value['number']) ? $value['number'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $desc = isset($value['desc']) ? $value['desc'] : '';
                $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
            	?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if ( $selected_icon ) : ?>
                            <div class="item--icon">
                                <?php if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                    else: ?>
                                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                                <?php endif; ?>
                                <?php if(!empty($number)) : ?>
                                    <div class="item--number">    
                                        <?php echo esc_attr($number); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="205" height="84" viewBox="0 0 205 84">
                                          <defs>
                                            <linearGradient id="ct-process-shape-<?php echo esc_attr($html_id.$key); ?>" x1="91.262" y1="0.781" x2="113.426" y2="83.5" gradientUnits="userSpaceOnUse">
                                              <stop offset="0%" style="stop-color:<?php echo esc_attr($t_gradient_color_from['from'] ); ?>;stop-opacity:1" />
                                              <stop offset="100%" style="stop-color:<?php echo esc_attr($t_gradient_color_to['to'] ); ?>;stop-opacity:1" />
                                            </linearGradient>
                                            <filter id="" x="-0.406" y="0.781" width="205.5" height="82.719" filterUnits="userSpaceOnUse">
                                              <feFlood result="flood" flood-color="#210404"/>
                                              <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                                              <feBlend result="blend" in2="SourceGraphic"/>
                                            </filter>
                                          </defs>
                                          <path fill="url(#ct-process-shape-<?php echo esc_attr($html_id.$key); ?>)" d="M43.878,2.627S92.29-12.581,82.2,44.178c-14.1,79.309,269.966,10.9,18.787,29.386C-86.831,87.387,43.878,2.627,43.878,2.627Z"/>
                                        </svg>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="item--title el-empty">    
                            <?php echo esc_attr($title); ?>
                        </h4>
                        <div class="item--description el-empty">    
                            <?php echo ct_print_html($desc); ?>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
