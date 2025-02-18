<?php
/**
 * The template for displaying Category Portfolio
 *
 * @package Itfirm
 */
get_header();
?>

<div class="container content-container">

    <div class="row content-row">
        <div id="primary" class="col-12">
            <main id="main" class="site-main">
                <div class="ct-grid ct-portfolio-grid1">
                    <?php if ( have_posts() )
                    {
                        while ( have_posts() )
                        {
                            the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called loop-post-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'portfolio' );
                        }

                        itfirm_posts_pagination();
                    }
                    else
                    {
                        get_template_part( 'template-parts/content', 'none' );
                    } ?>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
</div>

<?php get_footer(); ?>