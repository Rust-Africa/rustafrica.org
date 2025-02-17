<?php
if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}
/**
 * add shortcode to VC.
 *
 * @name Case Theme User_shortcodes
 * @since 1.0.0
 */
if (! class_exists ( 'Case_Theme_User_shortcodes' )) {
	class Case_Theme_User_shortcodes {
		function __construct() {
			add_action ( 'vc_before_init', array (
					$this,
					'add_shortcodes_params' 
			) );
			
			// shortcode login form.
			add_shortcode ( 'ct-user-form', array (
					$this,
					'add_shortcode_user_press' 
			) );
		}
		
		/**
		 * add shortcodes params to VC
		 */
		function add_shortcodes_params() {
			vc_map ( array (
					"name" => __ ( "Case Theme User Forms", 'ct-user-form' ),
					"base" => "ct-user-form",
					'class'    => 'ct-icon-element',
				    'description' => esc_html__( 'User Form Displayed', 'ct-user-form' ),
				    'category' => esc_html__('CaseThemes Shortcodes', 'ct-user-form'),
					"params" => array (
						array(
				            'type' => 'textfield',
				            'heading' => esc_html__( 'Element Title', 'ct-user-form' ),
				            'param_name' => 'el_title',
				            'value' => '',
				        ),
				        array(
				            'type' => 'textfield',
				            'heading' => esc_html__( 'Element Sub Title', 'ct-user-form' ),
				            'param_name' => 'el_sub_title',
				            'value' => '',
				        ),
				        array(
				            'type' => 'textfield',
				            'heading' => esc_html__( 'Element Description', 'ct-user-form' ),
				            'param_name' => 'el_desc',
				            'value' => '',
				        ),
						array (
							"type" => "dropdown",
							"heading" => esc_html__ ( "Form", "ct-user-form" ),
							"param_name" => "form_type",
							"description" => esc_html__ ( "Select form type.", "ct-user-form" ),
							"value" => array (
								esc_html__ ( 'Login', 'ct-user-form' ) => 'login',
								esc_html__ ( 'Register', 'ct-user-form' ) => 'register',
							),
							"std" => 'login' 
						),
						array (
							"type" => "dropdown",
							"heading" => esc_html__ ( "Other page", "ct-user-form" ),
							"param_name" => "other_page",
							"value" => array (
								esc_html__ ( 'No', 'ct-user-form' ) => 'no',
								esc_html__ ( 'Yes', 'ct-user-form' ) => 'yes',
							),
							"std" => 'no' 
						),
						array(
				            'type' => 'textfield',
				            'heading' => esc_html__( 'Label', 'raworganic' ),
				            'param_name' => 'label',
				            'value' => '',
				            'dependency' => array(
				                'element'=>'other_page',
				                'value'=>array(
				                    'yes',
				                )
				            ),
				        ),
				        array(
				            'type' => 'textfield',
				            'heading' => esc_html__( 'Text Link', 'raworganic' ),
				            'param_name' => 'text_link',
				            'value' => '',
				            'dependency' => array(
				                'element'=>'other_page',
				                'value'=>array(
				                    'yes',
				                )
				            ),
				        ),
				        array(
				            'type' => 'vc_link',
				            'heading' => esc_html__( 'Link', 'raworganic' ),
				            'param_name' => 'link',
				            'value' => '',
				            'dependency' => array(
				                'element'=>'other_page',
				                'value'=>array(
				                    'yes',
				                )
				            ),
				        ),
					)
			) );
		}
		
		/**
		 * display shortcode user press login form.
		 *
		 * @package Case Theme User
		 * @version 1.0.0
		 */
		function add_shortcode_user_press($atts, $content = '') {
			global $user_press;
			
			// if options null.
			if (! $atts)
				$atts = array ();
				
				// default array.
			$atts = array_merge ( array (
					'el_title' => '',
					'other_page' => '',
					'label' => '',
					'text_link' => '',
					'link' => '',
					'template' => get_option ( 'user_press_layout', 'default' ),
					'form_type' => 'login',
					'is_logged' => 'profile',
					'is_logged_text' => esc_html__ ( "Logout", "ct-user-form" ) 
			), $atts );
			
			// if template null.
			if (! $atts ['template']) {
				$atts ['template'] = 'default';
			}
			
			$user_press = $atts;
			
			ob_start();
			
			// if user logned.
			if (is_user_logged_in ()) {
				
				up_get_template_part ( $atts ['template'] . '/profile' );

			} else {
			
    			up_get_template_part ( $atts ['template'] . '/layout' );
			}

			return ob_get_clean();
		}
	}
	// start.
	new Case_Theme_User_shortcodes ();
}
