<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Itfirm
 */
$post_tags_on = itfirm_get_opt( 'post_tags_on', true );
$post_navigation_on = itfirm_get_opt( 'post_navigation_on', false );
$post_social_share_on = itfirm_get_opt( 'post_social_share_on', false );
$post_title_position = itfirm_get_opt( 'post_title_position', 'ptitle' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-hentry'); ?>>
    <div class="entry-blog">
        <?php if (has_post_thumbnail()) {
            echo '<div class="entry-featured">'; ?>
                <?php the_post_thumbnail('itfirm-post'); ?>
            <?php echo '</div>';
        } ?>
        <div class="entry-body">

            <?php itfirm_post_meta(); ?>

            <?php if($post_title_position == 'content') : ?>
                <h2 class="entry-title">
                    <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            <?php endif; ?>

            <div class="entry-content clearfix">
                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>

        </div>
    </div>
    <?php if($post_tags_on || $post_social_share_on ) :  ?>
        <div class="entry-footer">
            <?php if($post_tags_on) { itfirm_entry_tagged_in(); } ?>
            <?php if($post_social_share_on) { itfirm_socials_share_default(); } ?>
        </div>
    <?php endif; ?>

    <?php if($post_navigation_on) { itfirm_post_nav_default(); } ?>
</article><!-- #post -->