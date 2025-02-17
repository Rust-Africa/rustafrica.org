<?php
/**
 * The template for displaying logout text.
 *
 * @package Case Theme User
 * @author CaseThemes Team
 * @since Case Theme User 1.0.0
 */

if (! defined ( 'ABSPATH' )) {
	exit ();
}

global $user_press;

?>

<div class="ct-user-form">
	<?php if(!empty($user_press['el_title'])) : ?>
		<div class="ct-user-form-header">
			<h3><?php echo esc_attr( $user_press ['el_title'] ); ?></h3>
		</div>
	<?php endif; ?>
	<?php
		switch ($user_press['form_type']) {
			case 'login' :
				up_get_template_part ( $user_press['template'] . '/form', 'login' ); ?>
				<?php break;
			case 'register' :
				up_get_template_part ( $user_press['template'] . '/form', 'register' ); ?>
				<?php break;
		}
	?>
	<?php if($user_press ['other_page'] == 'yes' && !empty($user_press['label'])) : 
		$link = vc_build_link($user_press['link']);
		$a_href = '';
		$a_target = '';
		if ( strlen( $link['url'] ) > 0 ) {
		    $a_href = $link['url'];
		    $a_target = strlen( $link['target'] ) > 0 ? $link['target'] : '_self';
		}
		?>
		<div class="ct-user-form-footer">
			<?php echo esc_attr($user_press['label']); ?> <?php if(!empty($user_press['text_link'])) : ?><a href="<?php echo esc_url($a_href);?>" target="<?php  echo esc_attr($a_target); ?>"><?php echo esc_attr($user_press['text_link']); ?></a><?php endif; ?>
		</div>
	<?php endif; ?>
</div>