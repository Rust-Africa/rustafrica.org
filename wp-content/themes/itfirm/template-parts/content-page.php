<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Itfirm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content clearfix">
        <?php
            the_content();
            itfirm_entry_link_pages();
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
