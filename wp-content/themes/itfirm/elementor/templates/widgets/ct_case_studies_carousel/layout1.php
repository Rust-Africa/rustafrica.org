<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$img_size = $widget->get_setting('img_size');
$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}
$img_size_default = '333x167';
if(!empty($img_size)) {
    $img_size_default = $img_size;
}
$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel',
    'data-arrows' => $arrows,
    'data-dots' => $dots,
    'data-pauseOnHover' => $pause_on_hover,
    'data-autoplay' => $autoplay,
    'data-autoplaySpeed' => $autoplay_speed,
    'data-infinite' => $infinite,
    'data-speed' => $speed,
    'data-colxs' => $col_xs,
    'data-colsm' => $col_sm,
    'data-colmd' => $col_md,
    'data-collg' => $col_lg,
    'data-colxl' => $col_xl,
    'data-dir' => $carousel_dir,
    'data-slidesToScroll' => $slides_to_scroll,
    'data-fade' => 'true',
] );
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
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
<?php if(isset($settings['service']) && !empty($settings['service']) && count($settings['service'])): ?>
    <div class="ct-case-studies ct-case-studies1 ct-slick-slider">
        <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['service'] as $key => $value): 
                    $title = isset($value['title']) ? $value['title'] : '';
                    $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                    $description_text = isset($value['description_text']) ? $value['description_text'] : '';
                    $image = isset($value['image']) ? $value['image'] : '';
                    $image_type = isset($value['image_type']) ? $value['image_type'] : '';
                    $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                    if ( ! empty( $value['item_link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $value['item_link']['url'] );

                        if ( $value['item_link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $value['item_link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    if(!empty($image['id'])) : 
                        $img  = ct_get_image_by_size( array(
                            'attach_id'  => $image['id'],
                            'thumb_size' => '600x600',
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <?php if($image_type == 'default') : ?>
                                    <div class="item--image"><?php echo ct_print_html($thumbnail); ?></div>
                                <?php endif; ?>
                                <?php if($image_type == 'background') : ?>
                                    <div class="item--image bg-image" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
                                <?php endif; ?>
                                <div class="item--holder">
                                    <?php if(!empty($sub_title)) : ?>
                                        <div class="item--subtitle">
                                            <?php echo esc_html($sub_title); ?>
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
                                                <filter id="h-filter" x="-0.125" y="-0.094" width="32.406" height="12" filterUnits="userSpaceOnUse">
                                                  <feFlood result="flood"/>
                                                  <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                                                  <feBlend result="blend" in2="SourceGraphic"/>
                                                </filter>
                                                <filter id="h-filter-2" x="-10" y="14.594" width="29.656" height="6.406" filterUnits="userSpaceOnUse">
                                                  <feFlood result="flood"/>
                                                  <feComposite result="composite" operator="in" in2="SourceGraphic"/>
                                                  <feBlend result="blend" in2="SourceGraphic"/>
                                                </filter>

                                                <linearGradient id="h-grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                                  <stop offset="0%" style="stop-color:<?php echo esc_attr($gradient_color_from); ?>;stop-opacity:1" />
                                                  <stop offset="100%" style="stop-color:<?php echo esc_attr($gradient_color_to); ?>;stop-opacity:1" />
                                                </linearGradient>

                                              </defs>
                                              <g>
                                                <g style="fill: none; filter: url(#h-filter)">
                                                  <path id="h-path" class="h-cls-1" d="M-0.117,8.9H27.036s5.078-3.073,0-6.517" style="stroke: inherit; filter: none;"/>
                                                </g>
                                                <use xlink:href="#h-path" style="stroke: url(#h-grad1); filter: none; fill: none"/>
                                                <g style="fill: none; filter: url(#h-filter-2)">
                                                  <path id="h-bg" class="h-cls-2" d="M-9.991,14.594H17.352s5.114,3.027,0,6.422" style="stroke: inherit; filter: none;"/>
                                                </g>
                                                <use xlink:href="#h-bg" style="stroke: url(#h-grad1); filter: none; fill: none"/>
                                              </g>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                    <h3 class="item--title">
                                        <?php if ( ! empty( $value['item_link']['url'] ) ) : ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php endif; ?>
                                            <?php echo esc_attr($title); ?>
                                        <?php if ( ! empty( $value['item_link']['url'] ) ) : ?></a><?php endif; ?>
                                    </h3>
                                    <div class="item--description"><?php echo esc_html($description_text); ?></div>
                                    <?php if ( ! empty( $value['item_link']['url'] ) ) : ?>
                                        <div class="item--readmore">
                                            <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                                <i class="flaticon-right-arrow"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                           </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>