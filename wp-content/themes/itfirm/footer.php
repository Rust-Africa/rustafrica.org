<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package Itfirm
 */ 
$back_totop_on = itfirm_get_opt('back_totop_on', true);
?>
	</div><!-- #content inner -->
</div><!-- #content -->

<?php itfirm_footer(); ?>
<?php if (isset($back_totop_on) && $back_totop_on) : ?>
    <a href="#" class="scroll-top"><span><i class="caseicon-long-arrow-right-three"></i></span></a>
<?php endif; ?>

</div><!-- #page -->
<?php itfirm_search_popup(); ?>
<?php itfirm_sidebar_hidden(); ?>
<?php itfirm_cart_sidebar(); ?>
<?php itfirm_mouse_move_animation(); ?>
<?php wp_footer(); ?>

</body>
</html>
