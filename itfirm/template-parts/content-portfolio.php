<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Itfirm
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('archive-portfolio'); ?>>
    <div class="grid-item-inner">
        <?php if (has_post_thumbnail()) {
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'itfirm-portfolio'); 
            echo '<div class="item--featured">'; ?>
                <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('itfirm-portfolio'); ?></a>
            <?php echo '</div>';
        } ?>
        <div class="item--holder">
            <div class="item--meta">
                <h4 class="item--title">
                    <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h4>
                <div class="item--category"><?php the_terms( get_the_ID(), 'portfolio-category', '', ', ', '' ); ?></div>
            </div>
            <div class="item--readmore">
                <a href="<?php echo esc_url( get_permalink()); ?>">+</a>
            </div>
        </div>
    </div>
</article><!-- #post -->