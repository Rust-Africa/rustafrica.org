<?php
/**
 * The template for displaying all single portfolio
 *
 * @package Itfirm
 */
get_header();
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" class="col-12">
            <main id="main" class="site-main">
                <?php

                    while ( have_posts() )
                    {
                        the_post();
                        get_template_part( 'template-parts/content-portfolio/content', get_post_format() );
                        if ( comments_open() || get_comments_number() )
                        {
                            comments_template();
                        }
                    }
                    
                ?>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
</div>
<?php get_footer();
