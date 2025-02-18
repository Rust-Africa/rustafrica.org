<?php
/**
 * The header for our theme.
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Ewco
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="//gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <?php 
            itfirm_page_loading();
            itfirm_page_title_layout();
        ?>
        <div id="content" class="site-content">
            <div class="content-inner">
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