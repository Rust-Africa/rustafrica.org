<?php
/**
 * The template for displaying search results pages
 *
 * @package Itfirm
 */
$sidebar_pos = itfirm_get_opt( 'archive_sidebar_pos', 'right' );
get_header();
?>
<div class="container content-container">
    <div class="row content-row">
        <section id="primary"<?php itfirm_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
            <?php

                if ( have_posts() )
                {
                    while ( have_posts() )
                    {
                        the_post();

                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called loop-search-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content-search' );
                    }

                    itfirm_posts_pagination();
                }
                else
                {
                    get_template_part( 'template-parts/content', 'none' );
                }

            ?>
            </main><!-- #main -->
        </section><!-- #primary -->
        <?php if ( 'left' == $sidebar_pos && is_active_sidebar( 'sidebar-blog' ) || 'right' == $sidebar_pos && is_active_sidebar( 'sidebar-blog' ) ) : ?>
            <aside id="secondary"<?php itfirm_secondary_class( $sidebar_pos, 'widget-area' ); ?>>
                <div class="sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();
