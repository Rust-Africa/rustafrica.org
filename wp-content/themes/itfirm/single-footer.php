<?php
/**
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
                        the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-body">
                                <div class="entry-content clearfix">
                                    <?php the_content(); ?>
                                </div><!-- .entry-content -->
                            </div>
                        </article><!-- #post -->
                        <?php if ( comments_open() || get_comments_number() )
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
