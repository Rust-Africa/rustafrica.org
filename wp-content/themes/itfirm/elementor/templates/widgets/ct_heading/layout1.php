<?php
$default_settings = [
    'title' => '',
    'title_tag' => 'h3',
    'style' => 'st-default',
    'sub_title' => '',
    'sub_title_style' => '',
    'text_align' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
    'ct_animate_sub' => '',
    'ct_animate_delay_sub' => '',
    'ct_icon' => '',
    'highlight_color' => '',
    'highlight_color_gradient' => '',
    'sub_title_color' => '',
    'sub_title_color_gradient' => '',
    'highlight_style' => '',
    'line_color_gr_from' => '',
    'line_color_gr_to' => '',
    'highlight_image' => '',
    'text_below' => '',
    'text_below_color' => '',
    'text_below_color_gradient' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);

$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title );
$primary_color = itfirm_get_opt( 'primary_color', '#006cff' );
$gradient_color = itfirm_get_opt( 'gradient_color' );
if ( !empty($gradient_color['from']) && isset($gradient_color['from']) ) {
    $gradient_color_from = $gradient_color['from'];
} else {
    $gradient_color_from = $primary_color;
}
if ( !empty($gradient_color['to']) && isset($gradient_color['to']) ) {
    $gradient_color_to = $gradient_color['to'];
} else {
    $gradient_color_to = $primary_color;
}
?>
<div id="<?php echo esc_attr($html_id); ?>" class="ct-heading h-align-<?php echo esc_attr($text_align); ?> item-<?php echo esc_attr($style); ?> highlight-<?php echo esc_attr($highlight_style); ?>">
  <div class="ct-heading--inner"> 
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($highlight_color) && !empty($highlight_color_gradient) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-heading .ct-text-highlight {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($highlight_color); ?>), to(<?php echo esc_attr($highlight_color_gradient); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($highlight_color); ?>, <?php echo esc_attr($highlight_color_gradient); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($highlight_color); ?>, <?php echo esc_attr($highlight_color_gradient); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($highlight_color); ?>, <?php echo esc_attr($highlight_color_gradient); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($highlight_color); ?>, <?php echo esc_attr($highlight_color_gradient); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($highlight_color); ?>, <?php echo esc_attr($highlight_color_gradient); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($highlight_color); ?>', endColorStr='<?php echo esc_attr($highlight_color_gradient); ?>');
                background-color: transparent;
                background-clip: text;
                -o-background-clip: text;
                -ms-background-clip: text;
                -moz-background-clip: text;
                -webkit-background-clip: text;
                text-fill-color: transparent;
                -o-text-fill-color: transparent;
                -ms-text-fill-color: transparent;
                -moz-text-fill-color: transparent;
                -webkit-text-fill-color: transparent;
            }
        <?php endif; ?>
        <?php if( !empty($sub_title_color) && !empty($sub_title_color_gradient) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-heading .item--sub-title span {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($sub_title_color); ?>), to(<?php echo esc_attr($sub_title_color_gradient); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($sub_title_color); ?>, <?php echo esc_attr($sub_title_color_gradient); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($sub_title_color); ?>, <?php echo esc_attr($sub_title_color_gradient); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($sub_title_color); ?>, <?php echo esc_attr($sub_title_color_gradient); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($sub_title_color); ?>, <?php echo esc_attr($sub_title_color_gradient); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($sub_title_color); ?>, <?php echo esc_attr($sub_title_color_gradient); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($sub_title_color); ?>', endColorStr='<?php echo esc_attr($sub_title_color_gradient); ?>');
                background-color: transparent;
                background-clip: text;
                -o-background-clip: text;
                -ms-background-clip: text;
                -moz-background-clip: text;
                -webkit-background-clip: text;
                text-fill-color: transparent;
                -o-text-fill-color: transparent;
                -ms-text-fill-color: transparent;
                -moz-text-fill-color: transparent;
                -webkit-text-fill-color: transparent;
            }
        <?php endif; ?>
        <?php if( !empty($line_color_gr_from) && !empty($line_color_gr_to) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-heading .st-line-gr .ct-text-inner::before {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($line_color_gr_from); ?>), to(<?php echo esc_attr($line_color_gr_to); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($line_color_gr_from); ?>', endColorStr='<?php echo esc_attr($line_color_gr_to); ?>');
            }
        <?php endif; ?>
        <?php if( !empty($highlight_image['url']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-heading .ct-text-highlight::before {
                background-image: url(<?php echo esc_url($highlight_image['url']); ?>);
            }
        <?php endif; ?>">
    </div>
  <?php if(!empty($sub_title)) : ?>
    <div class="item--text-below">
      <div class="ct-inline-css"  data-css="
        <?php if( !empty($text_below_color) && !empty($text_below_color_gradient) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-heading .item--text-below {
              background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($text_below_color); ?>), to(<?php echo esc_attr($text_below_color_gradient); ?>));
              background-image: -webkit-linear-gradient(to bottom, <?php echo esc_attr($text_below_color); ?>, <?php echo esc_attr($text_below_color_gradient); ?>);
              background-image: -moz-linear-gradient(to bottom, <?php echo esc_attr($text_below_color); ?>, <?php echo esc_attr($text_below_color_gradient); ?>);
              background-image: -ms-linear-gradient(to bottom, <?php echo esc_attr($text_below_color); ?>, <?php echo esc_attr($text_below_color_gradient); ?>);
              background-image: -o-linear-gradient(to bottom, <?php echo esc_attr($text_below_color); ?>, <?php echo esc_attr($text_below_color_gradient); ?>);
              background-image: linear-gradient(to bottom, <?php echo esc_attr($text_below_color); ?>, <?php echo esc_attr($text_below_color_gradient); ?>);
              filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($text_below_color); ?>', endColorStr='<?php echo esc_attr($text_below_color_gradient); ?>');
            }
        <?php endif; ?>">
      </div>
      <?php echo esc_attr($text_below); ?>
    </div>
  <?php endif; ?>

	<?php if(!empty($sub_title)) : ?>
		<div class="item--sub-title <?php echo esc_attr($sub_title_style); ?> <?php echo esc_attr($ct_animate_sub); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay_sub); ?>ms">
            <?php if($sub_title_style == 'style-icon-leftright') : ?>
                <svg class="svg-left" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="21" viewBox="0 0 33 21">
                  <defs>
                    <style>
                      .h-cls-1, .h-cls-2 {
                        fill: none;
                        stroke-width: 3px;
                        fill-rule: evenodd;
                      }

                      .h-cls-1 {
                        filter: url(#filter);
                      }

                      .h-cls-2 {
                        filter: url(#filter-2);
                      }
                    </style>
                    <filter id="left-h-filter<?php echo esc_attr($html_id); ?>" x="-0.125" y="-0.094" width="32.406" height="12" filterUnits="userSpaceOnUse">
                      <feFlood result="flood"/>
                      <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                      <feBlend result="blend" in2="SourceGraphic"/>
                    </filter>
                    <filter id="left-h-filter-2<?php echo esc_attr($html_id); ?>" x="-10" y="14.594" width="29.656" height="6.406" filterUnits="userSpaceOnUse">
                      <feFlood result="flood"/>
                      <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                      <feBlend result="blend" in2="SourceGraphic"/>
                    </filter>

                    <linearGradient id="left-h-grad1<?php echo esc_attr($html_id); ?>" x1="0%" y1="0%" x2="100%" y2="0%">
                      <stop offset="0%" style="stop-color:<?php echo esc_attr($gradient_color_from); ?>;stop-opacity:1" />
                      <stop offset="100%" style="stop-color:<?php echo esc_attr($gradient_color_to); ?>;stop-opacity:1" />
                    </linearGradient>

                  </defs>
                  <g>
                    <g style="fill: none; filter: url(#left-h-filter<?php echo esc_attr($html_id); ?>)">
                      <path id="left-h-path<?php echo esc_attr($html_id); ?>" class="h-cls-1" d="M-0.117,8.9H27.036s5.078-3.073,0-6.517" style="stroke: inherit; filter: none;"/>
                    </g>
                    <use xlink:href="#left-h-path<?php echo esc_attr($html_id); ?>" style="stroke: url(#left-h-grad1<?php echo esc_attr($html_id); ?>); filter: none; fill: none"/>
                    <g style="fill: none; filter: url(#left-h-filter-2<?php echo esc_attr($html_id); ?>)">
                      <path id="left-h-bg<?php echo esc_attr($html_id); ?>" class="h-cls-2" d="M-9.991,14.594H17.352s5.114,3.027,0,6.422" style="stroke: inherit; filter: none;"/>
                    </g>
                    <use xlink:href="#left-h-bg<?php echo esc_attr($html_id); ?>" style="stroke: url(#left-h-grad1<?php echo esc_attr($html_id); ?>); filter: none; fill: none"/>
                  </g>
                </svg>
            <?php endif; ?>
            <span>
                <?php echo esc_attr($sub_title); ?>
            </span>
            <?php if($sub_title_style == 'style-icon-right' || $sub_title_style == 'style-icon-leftright') : ?>
                <svg class="svg-right" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="33" height="21" viewBox="0 0 33 21">
                  <defs>
                    <style>
                      .h-cls-1, .h-cls-2 {
                        fill: none;
                        stroke-width: 3px;
                        fill-rule: evenodd;
                      }

                      .h-cls-1 {
                        filter: url(#filter);
                      }

                      .h-cls-2 {
                        filter: url(#filter-2);
                      }
                    </style>
                    <filter id="right-h-filter<?php echo esc_attr($html_id); ?>" x="-0.125" y="-0.094" width="32.406" height="12" filterUnits="userSpaceOnUse">
                      <feFlood result="flood"/>
                      <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                      <feBlend result="blend" in2="SourceGraphic"/>
                    </filter>
                    <filter id="right-h-filter-2<?php echo esc_attr($html_id); ?>" x="-10" y="14.594" width="29.656" height="6.406" filterUnits="userSpaceOnUse">
                      <feFlood result="flood"/>
                      <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                      <feBlend result="blend" in2="SourceGraphic"/>
                    </filter>

                    <linearGradient id="right-h-grad1<?php echo esc_attr($html_id); ?>" x1="0%" y1="0%" x2="100%" y2="0%">
                      <stop offset="0%" style="stop-color:<?php echo esc_attr($gradient_color_from); ?>;stop-opacity:1" />
                      <stop offset="100%" style="stop-color:<?php echo esc_attr($gradient_color_to); ?>;stop-opacity:1" />
                    </linearGradient>

                  </defs>
                  <g>
                    <g style="fill: none; filter: url(#right-h-filter<?php echo esc_attr($html_id); ?>)">
                      <path id="right-h-path<?php echo esc_attr($html_id); ?>" class="h-cls-1" d="M-0.117,8.9H27.036s5.078-3.073,0-6.517" style="stroke: inherit; filter: none;"/>
                    </g>
                    <use xlink:href="#right-h-path<?php echo esc_attr($html_id); ?>" style="stroke: url(#right-h-grad1<?php echo esc_attr($html_id); ?>); filter: none; fill: none"/>
                    <g style="fill: none; filter: url(#right-h-filter-2<?php echo esc_attr($html_id); ?>)">
                      <path id="right-h-bg<?php echo esc_attr($html_id); ?>" class="h-cls-2" d="M-9.991,14.594H17.352s5.114,3.027,0,6.422" style="stroke: inherit; filter: none;"/>
                    </g>
                    <use xlink:href="#right-h-bg<?php echo esc_attr($html_id); ?>" style="stroke: url(#right-h-grad1<?php echo esc_attr($html_id); ?>); filter: none; fill: none"/>
                  </g>
                </svg>
            <?php endif; ?>
        </div>
	<?php endif; ?>
    <<?php echo esc_attr($title_tag); ?> class="item--title <?php echo esc_attr($style); ?> <?php if($ct_animate != 'case-fade-in-up') { echo esc_attr($ct_animate); } else { echo 'case-animate-time'; } ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
        <?php if($ct_animate == 'case-fade-in-up') {
            $arr_str = explode(' ', $title);
            foreach ($arr_str as $index => $value) {
                $arr_str[$index] = '<span class="slide-in-container"><span class="d-inline-block wow '.$ct_animate.'">' . $value . '</span></span>';
            }
            $str = implode(' ', $arr_str);
            echo wp_kses_post($str);
        } else {
            echo '<span class="ct-text-inner">';
            echo wp_kses_post($editor_title);
            echo '</span>';
        } ?>
    </<?php echo esc_attr($title_tag); ?>>
  </div>
</div>
