<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Itfirm
 */
$archive_categories_on = itfirm_get_opt( 'archive_categories_on', false );
$archive_readmore_text = itfirm_get_opt( 'archive_readmore_text' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry archive'); ?>>
    
    <?php if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'itfirm-post'); 
        echo '<div class="entry-featured">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('itfirm-post'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="entry-body">
        <?php itfirm_archive_meta(); ?>
        <h2 class="entry-title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title(); ?>">
                <?php if(is_sticky()) { ?>
                    <i class="caseicon-tick"></i>
                <?php } ?>
                <?php the_title(); ?>
            </a>
        </h2>
        <div class="entry-excerpt">
            <?php
                itfirm_entry_excerpt();
                wp_link_pages( array(
                    'before'      => '<div class="page-links">',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>
        </div>
        <div class="entry-readmore">
            <a class="btn" href="<?php echo esc_url( get_permalink()); ?>">
                <span><?php if(!empty($archive_readmore_text)) { echo esc_attr($archive_readmore_text); } else { echo esc_html__('Read More', 'itfirm'); } ?></span>
                <i class="caseicon-angle-arrow-right"></i>
            </a>
        </div>
    </div>
</article><!-- #post -->