<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Itfirm
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-body">
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

        </div><!-- .entry-content -->
    </div>
</article><!-- #post -->