jQuery(document).ready(function($) {

	"use strict";
	/* enter key / input. */
    $(document).find('.ct-user-form-login .login-group').on('keypress', 'input', function(e) {
		var keycode = (e.keyCode ? e.keyCode : e.which);

		if (keycode == '13') {
			user_press_login($(this));
		}
	});
	/* event login key press */
    $(document).find('.ct-user-form-login .login-group').on('keypress', 'input', function(e) {
		wl_alert( $(this), '', 'hide' );
	});
	/* login click. */
	$(document).find('.ct-user-form').on('click', '.button-login', function( e ) {
		e.preventDefault();
		user_press_login($(this));
	});

	/* register login */
    $(document).find('.ct-user-form-register').on('click', '.btn-up-register', function( e ) {
		e.preventDefault();
		user_press_register( $(this) );
	});
	/* event press key register login */
    $(document).find('.ct-user-form-register').on('keypress', 'input', function( e ) {
		wl_alert( $(this), '', 'hide' );
	});
	/* enter for register */
    $(document).find('.ct-user-form').on('keypress', 'input', function(e) {
		var keycode = (e.keyCode ? e.keyCode : e.which);
		if (keycode == '13') {
			user_press_register($(this));
		}
	});

	/**
	 * Register
	 *
	 * validate field, get field values, run register ajax
	 **/
	function user_press_register( e ) {

		/* form element. */
		var _form = e.parents('.ct-user-form-register');

		/* input object elements */
		var input_user 			= _form.find('input#res_user');
		var input_pass 			= _form.find('input#res_pass1');
		var input_passconfirm 	= _form.find('input#res_pass2');
		var input_email 		= _form.find('input#res_email');

		var register_data = register_validation( input_user, input_pass, input_passconfirm, input_email );

		/* ajax. */
		if( register_data !== false ) {
			/* disabled all elements. */
			user_press_disabled(_form);
			$.post(userpress.ajax, {
				'action'		: 'form_ajax_register',
				'data'			: register_data,
				'_ajax_nonce' 	: userpress.nonce

			}, function (response) {

				/* if error. */
				if (response.error == true) {
					/* alert if user null. */
					if ( response.user_null != undefined )
						wl_alert( input_user, response.user_null );
					/* alert if pass null. */
					if ( response.pass_null != undefined )
						wl_alert( input_pass, response.pass_null );
					/* alert if email null */
					if ( response.email_null != undefined )
						wl_alert( input_email, response.email_null );
					/* pass confirm */
					if ( response.passconfirm != undefined )
						wl_alert( input_passconfirm, response.passconfirm );
					/* valid user name */
					if ( response.user_invalid != undefined )
						wl_alert( input_user, response.user_invalid );
					/* user name exists */
					if ( response.user_exists != undefined )
						wl_alert( input_user, response.user_exists );
					/* email registered */
					if ( response.email_exists != undefined )
						wl_alert( input_email, response.email_exists );
				} else {
					location.reload();
				}
			});
			/* enable all elements. */
			user_press_enable(_form);
		}
	}

	/**
	 * For validation fields
	 * if all field is valid, return all fields value
	 *
	 * @param object input_user
	 * @param object input_pass
	 * @param object input_passconfirm
	 * @param object input_email
	 */
	function register_validation( input_user, input_pass, input_passconfirm, input_email ) {
		var is_form_valid = true;
		/* get input val */
		var input_user_val 		  = input_user.val().trim();
		var input_pass_val 		  = input_pass.val().trim();
		var input_passconfirm_val = input_passconfirm.val().trim();
		var input_email_val 	  = input_email.val().trim();

		if ( input_user_val == '' ) {
			wl_alert( input_user, input_user.data('validate') );
			is_form_valid = false;
		} else if ( 4 > input_user_val.length ) {
			wl_alert( input_user, input_user.data('user-length') );
			is_form_valid = false;
		}

		if ( input_pass_val == '' ) {
			wl_alert( input_pass, input_pass.data('validate') );
			is_form_valid = false;
		} else 		if ( 5 > input_pass_val.length ) {
			wl_alert( input_pass, input_pass.data('pass-length') );
			is_form_valid = false;
		} else if ( input_pass_val != input_passconfirm_val ) {
			wl_alert( input_passconfirm, input_passconfirm.data('pass-confirm') );
			is_form_valid = false;
		}

		if ( input_email_val == '' ) {
			wl_alert( input_email, input_email.data('validate') );
			is_form_valid = false;
		} else if( validateEmail(input_email_val) === false ) {
			wl_alert( input_email, input_email.data('email-format') );
			is_form_valid = false;
		}

		if( is_form_valid === true ) {
			var register_data = {};
			/* get register data. */
			register_data.user 			= input_user_val;
			register_data.pass 			= input_pass_val;
			register_data.email 		= input_email_val;
			register_data.passconfirm 	= input_passconfirm_val;
			return register_data;
		} else {
			return false;
		}
	}

	/**
	 * login.
	 * 
	 * validate field, get field values, run ajax.
	 * 
	 * @author CaseThemes Team
	 */
	function user_press_login(e) {

		var login_data = {};

		/* form element. */
		var _form = e.parents('.ct-user-form');

		/* input element. */
		var input_user = _form.find('input.user_name');
		var input_pass = _form.find('input.password');

		/* get input val. */
		var input_user_val = input_user.val();
		var input_pass_val = input_pass.val();

		/* validate user name. */
		if (input_user_val == '')
			wl_alert( input_user, input_user.data('validate') );

		/* validate password. */
		if (input_pass_val == '')
			wl_alert( input_pass, input_pass.data('validate') );

		/* get login data. */
		login_data.user 		= input_user_val;
		login_data.pass 		= input_pass_val;
		login_data.rememberme 	= _form.find('input.rememberme').val();

		/* id user & pass exists. */
		if (login_data.user && login_data.pass) {
			
			/* disabled all elements. */
			user_press_disabled(_form);

			/* ajax. */
			$.post(userpress.ajax, {
				'action' 		: 'user_press_login',
				'data' 	 		: login_data,
				'_ajax_nonce' 	: userpress.nonce
			}, function(response) {
				/* if error. */
				if (response.error == true) {
					/* validate user. */
					if (response.user != undefined) {
						wl_alert( input_user, response.user );
					}
					/* validate pass. */
					if (response.pass != undefined) {
						wl_alert( input_pass, response.pass );
					}

				} else {
					location.reload();
				}
				
				/* enable all elements. */
				user_press_enable(_form);
			});
		}
	}

	/**
	 * Disabled all input, button, select.
	 */
	function user_press_disabled(_form) {
		_form.find('input, button, select').each(function() {
			$(this).prop('disabled', true);
		});
	}

	/**
	 * enable all input, button, select.
	 */
	function user_press_enable(_form) {
		_form.find('input, button, select').each(function() {
			$(this).prop('disabled', false);
		});
	}

	/**
	 * For validate email format
	 */
	function validateEmail(email) {
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return re.test(email);
	}

	/* For alert in Wellow site */
	function wl_alert( obj, message, mode ) {

		mode = (mode) ? mode : 'show';
		if( mode == 'show' ) {

			if( obj.next().hasClass('wpcf7-not-valid-tip') === false ) {
				obj.after( '<span role="alert" class="wpcf7-not-valid-tip" style="display:none">' + message + '</span>' );
				obj.next().fadeIn('slow');
			} else {
				if( obj.parent().find('.wpcf7-not-valid-tip').length > 0 ) {
					obj.parent().find('.wpcf7-not-valid-tip').remove();
					obj.after( '<span role="alert" class="wpcf7-not-valid-tip" style="display:none">' + message + '</span>' );
					obj.next().fadeIn('slow');
				}
			}
		} else {
			if( obj.parent().find('.wpcf7-not-valid-tip').length > 0 ) {
				obj.parent().find('.wpcf7-not-valid-tip').fadeOut('slow');
			}
		}
	}
});