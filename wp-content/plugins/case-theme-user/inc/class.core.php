<?php
if (! defined ( 'ABSPATH' )) {
	exit ();
}
/**
 * Add Case Theme User Core.
 *
 * @name Case Theme User_Core
 * @since 1.0.0
 */
if (! class_exists ( 'Case_Theme_User_Core' )) {
	class Case_Theme_User_Core {
		function __construct() {
			//add_filter( 'login_redirect', array($this, 'login_redirect', 10, 3 ));
		}
		
		function login_redirect($redirect_to, $request, $user) {
			global $user;
			
			//return home_url();
		}
	}
	
	new Case_Theme_User_Core;
}