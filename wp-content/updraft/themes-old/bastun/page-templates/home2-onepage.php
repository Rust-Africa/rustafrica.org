<?php
/*
 * Template Name: Home 2 Onepage
 * Description: A Page Template with a Page Builder design.
 */
$bastun_redux_demo = get_option('redux_demo');
get_template_part( 'header/header', 'home2-onepage' );
?>
    <?php if (have_posts()){ ?>
        <?php while (have_posts()) : the_post()?>
          <?php the_content(); ?>
        <?php endwhile; ?>
    <?php }else {
        echo esc_html__( 'Page Canvas For Page Builder', 'bastun' );
    }?>
<?php
get_template_part( 'footer/footer', 'home2' );
?>