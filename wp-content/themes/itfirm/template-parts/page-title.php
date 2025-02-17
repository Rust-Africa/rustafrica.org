<?php
$titles = itfirm_get_page_titles();

$pagetitle = itfirm_get_opt( 'pagetitle', 'show' );
$custom_pagetitle = itfirm_get_page_opt( 'custom_pagetitle', 'themeoption');
if($custom_pagetitle != 'themeoption' && $custom_pagetitle != '') {
    $pagetitle = $custom_pagetitle;
}

$sub_title = itfirm_get_page_opt( 'sub_title' );
$sub_title_position = itfirm_get_page_opt( 'sub_title_position', 'bottom-title' );
ob_start();
if ( $titles['title'] )
{
    printf( '<h1 class="ct-page-title">%s</h1>', wp_kses_post($titles['title']) );
}
$titles_html = ob_get_clean();
$ptitle_breadcrumb_on = itfirm_get_opt( 'ptitle_breadcrumb_on', 'show' );
if($pagetitle == 'show') : ?>
    <div id="ct-pagetitle" class="ct-pagetitle bg-image">
        <div class="container">
            <div class="ct-page-title-holder">
                <?php if(!empty($sub_title)) : ?>
                    <h6 class="ct-page-sub-title"><?php echo esc_attr($sub_title); ?></h6>
                <?php endif; ?>
                <?php printf( '%s', wp_kses_post($titles_html)); ?>
            </div>

            <?php if($ptitle_breadcrumb_on == 'show') : ?>
                <?php itfirm_breadcrumb(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>