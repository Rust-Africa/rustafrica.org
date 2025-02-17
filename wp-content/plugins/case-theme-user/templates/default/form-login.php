<?php
/**
 * The template for displaying login form.
 *
 * Override this template by copying it to yourtheme/userpress/layoutname/form-login.php
 *
 * @author 		Case Theme User
 * @version     1.0.0
 */

if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
?>
<div class="ct-user-form-body ct-user-form-login">
	<div class="login-form" >
		<div class="fields-content">
			<div class="field-group">
				<input id="user" type="text" class="input user_name" placeholder="<?php esc_html_e('Username', 'case-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'case-theme-user'); ?>">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="field-group">
				<input id="pass" type="password" class="input password" placeholder="<?php esc_html_e('Password', 'case-theme-user'); ?>" data-validate="<?php esc_html_e('Required Field', 'case-theme-user'); ?>">
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="field-group field-footer-group">
				<button type="button" class="button button-login"><?php esc_html_e('Log In', 'case-theme-user');?></button>
			</div>
		</div>
	</div>
</div>
