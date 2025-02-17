<?php
/**
 * Define User-Press hook
 *
 * @author Jax
 **/
add_action( 'ct-user-form/form/login/after', 'up_hook_login_form_recaptcha' );

/**
 * Providing an implementation for 'up_hook_login_form_recaptcha'
 * to add Google recatcha to login form
 *
 * @author Jax
 */
function up_hook_login_form_recaptcha() {
    global $user_press;
    $user_press['template'] = (isset($user_press['template']) && $user_press['template'] != '')? $user_press['template'] : 'default';
    up_get_template_part( "{$user_press['template']}/recaptcha" );
}