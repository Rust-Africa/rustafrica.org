<?php
   $bastun_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>
    <?php the_content(); ?>
    <?php wp_link_pages( array(
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'bastun' ),
        'after'       => '</div>',
        'link_before' => '<p class="page-number">',
        'link_after'  => '</p>',
    ) ); ?>
<?php endwhile; ?>
<?php
    get_footer();
?>