<?php
/**
 * Template Name: Blog Classic
 *
 * @package Itfirm
 */

get_header();
$sidebar_pos = '';
$show_sidebar_page = itfirm_get_page_opt( 'show_sidebar_page', false );
if ($show_sidebar_page){
    $sidebar_pos = itfirm_get_page_opt( 'sidebar_page_pos' );
}
?>
<div class="container content-container">
    <div class="row content-row">
        <div id="primary" <?php itfirm_primary_class( $sidebar_pos, 'content-area' ); ?>>
            <main id="main" class="site-main">
            <?php
                global $wp_query, $paged;
                $wp_query->query('post_type=post&showposts='.get_option('posts_per_page').'&paged='.$paged);
                
                if ( have_posts() ) { 
                    ?>
                    <div class="blog-hentry">
                        <?php while ( have_posts() )
                        {
                            the_post();
                            get_template_part( 'template-parts/content', get_post_format() );
                            
                        } ?>
                    </div>
                    <?php itfirm_posts_pagination();
                }
                else
                {
                    get_template_part( 'template-parts/content', 'none' );
                }

            ?>
            </main><!-- #main -->
        </div><!-- #primary -->

        <?php if ( 'left' == $sidebar_pos || 'right' == $sidebar_pos ) : ?>
            <aside id="secondary" <?php itfirm_secondary_class( $sidebar_pos, 'sidebar-fixed widget-area' ); ?>>
                <div class="sidebar-sticky">
                    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
                </div>
            </aside>
        <?php endif; ?>
    </div>
</div>
<?php
get_footer();