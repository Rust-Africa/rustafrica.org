<?php
use Elementor\Icons_Manager;
Icons_Manager::enqueue_shim();

$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list2' => '',
    'thumbnail_size' => '',
    'thumbnail_custom_dimension' => '',
    'icon' => '',
    'star' => '',
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
?>
<?php if(isset($content_list2) && !empty($content_list2) && count($content_list2)): ?>
    <div class="ct-grid ct-testimonial-grid2">
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list2 as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $review_check = isset($value['review_check']) ? $value['review_check'] : '';
                $description = isset($value['description']) ? $value['description'] : '';
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if($star2 == 'show') : ?>
                            <div class="item--star">
                                <div class="item--star-number">5.0</div>
                                <div class="item--star-icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="item--description el-empty"><?php echo ct_print_html($description); ?></div>
                        <div class="item--title el-empty">    
                            <?php echo esc_attr($title); ?>
                        </div>
                        <?php if(!empty($review_check)) : ?>
                            <div class="item--review"><i class="flaticon-check"></i><?php echo esc_attr($review_check); ?></div>
                        <?php endif; ?>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
