<?php
/**
 * Admin Class.
 *
 * @author CaseThemes Team
 * @package Case Theme User
 * @version 1.0.0
 */
if (! defined ( 'ABSPATH' )) {
	exit (); // Exit if accessed directly
}

if (! class_exists ( 'Case_Theme_User_admin' )) {

	class Case_Theme_User_admin {  

		function __construct() {
                    
			add_action( 'admin_init', array(
				$this,
				'register_plugin_settings' ));


			// add admin page.
			add_action ( 'admin_menu', array (
				$this,
				'add_admin_page'
			) );

			// get current tab content.
			add_action( 'ct-user-form/inc/admin/tab/content', array(
				$this,
				'add_admin_tab_content'
			));
			
			add_filter( 'plugin_action_links_' . userpress()->basename, array( $this, 'plugin_action_links' ) );
		}

		/**
		 * register settings.
		 *
		 * @package Case Theme User
		 */
		function register_plugin_settings() {

			/* reservation options. */
		
			register_setting('ct-user-form-general-group', 'user_press_layout');
            register_setting('ct-user-form-general-group', 'user_press_bg_color');
            register_setting('ct-user-form-general-group', 'user_press_bg_img');
            
            /* reservation options Email . */
            
            register_setting('ct-user-form-email-group', 'user_press_subject_email');
            register_setting('ct-user-form-email-group', 'user_press_email_send');
            register_setting('ct-user-form-email-group', 'ct-user-form-conten-email');
                        
                      
		}
		
		/**
		 * Show action links on the plugin screen.
		 *
		 * @param	mixed $links Plugin Action links
		 * @return	array
		 */
		function plugin_action_links( $links ){
			
			$action_links = array(
                 'settings' => '<a href="' . admin_url( 'users.php?page=ct-user-form_admin' ) . '" title="' . esc_attr( esc_html__( 'View Users Press Settings', 'ct-user-form' ) ) . '">' . esc_html__( 'Settings', 'ct-user-form' ) . '</a>',
			);
			
			return array_merge( $action_links, $links );
		}
		
		/**
		 * Add admin pages.
		 *
		 * @package Case Theme User
		 */
		function add_admin_page() {
			add_users_page ( esc_html__ ( 'Users Press', 'ct-user-form' ), esc_html__ ( 'Users Press', 'ct-user-form' ), 'manage_options', 'ct-user-form_admin', array (
				$this,
				'add_admin_page_main'
			) );
		}

		/**
		 * Admin page options.
		 *
		 * General, Products, Reservation, Custom Fields ...
		 * @package Case Theme User
		 */
		function add_admin_page_main() {

			global $current_tab;

			$current_tab = 'email';

			if(!empty($_REQUEST['tab']))
				$current_tab = $_REQUEST['tab'];

			$tabs = array (
				'email' => esc_html__('Email', 'ct-user-form'),
			);

			$tabs = apply_filters('ct-user-form/admin/tabs', $tabs);

			?>
			<h1><?php esc_html_e('Case Theme User', 'ct-user-form'); ?></h1>
			<p><?php esc_html_e('A wordpress user manager plugin.', 'ct-user-form'); ?></p>
			<div class="wrap news-twitter">
				<form id="mainform" method="post" action="options.php">
					<div class="news-twitter-woocommerce-settings" id="icon-woocommerce">
						<br />
					</div>
					<h2 class="nav-tab-wrapper woo-nav-tab-wrapper">
						<?php foreach ($tabs as $key => $tab): ?>
							<a href="<?php echo admin_url( 'users.php?page=ct-user-form_admin&tab=' . $key ); ?>" class="nav-tab<?php echo ( $current_tab == $key ? ' nav-tab-active' : '' ) ; ?>"><?php echo esc_html($tab); ?></a>
						<?php endforeach; ?>
					</h2>

					<?php  do_action('ct-user-form/inc/admin/tab/content'); ?>

					<?php submit_button(); ?>

				</form>
			</div>
			<?php
		}

		/**
		 * Admin tab options.
		 *
		 * content tabs.
		 * @package Case Theme User
		 */
		function add_admin_tab_content() {

			global $current_tab ;

			if(empty($current_tab)) return ;

			$tab = apply_filters('ct-user-form/inc/admin/tab/template', userpress()->plugin_dir . "admin/html_tab_$current_tab.php");

			if(!file_exists($tab)) return ;

			settings_fields( "ct-user-form-$current_tab-group" );
			do_settings_sections( "ct-user-form-$current_tab-group" );

			require_once $tab;
		}
		
		/**
		 * Text field.
		 * 
		 * @param array $options
		 */
		private function option_text($options){
				
			$option_value = get_option( $options['id'], $options['default'] );
                       
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
				</th>
				<td class="forminp">
					<input name="<?php echo esc_attr( $options['id'] ); ?>" id="<?php echo esc_attr( $options['id'] ); ?>" type="text" value="<?php echo esc_attr( $option_value ); ?>" placeholder="<?php echo esc_attr( $options['placeholder'] ); ?>" />
                                        <label><?php echo $options['description'] ?></label>
				</td>
			</tr>
			<?php
		}
			
		/**
		 * Select field.
		 *
		 * @param array $options
		 */
		private function option_select($options){
			
			$option_value = get_option( $options['id'], $options['default'] );

			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
				</th>
				<td class="forminp">
					<select name="<?php echo esc_attr( $options['id'] ); ?>" id="<?php echo esc_attr( $options['id'] ); ?>">
						<?php foreach ($options['options'] as $key => $item): ?>
						<option value="<?php echo esc_attr($key); ?>"<?php if($option_value == $key){ echo ' selected="selected"'; } ?>><?php echo esc_html($item); ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<?php
		}
		
                 /**
		 * field. select color`
		 * 
		 * @param array $options
		 */
            private function option_color($options){

                    $option_value = get_option( $options['id'], $options['default'] );

                    ?>
                    <tr valign="top" class="ct-user-form-option-color">
                            <th scope="row" class="titledesc">
                                    <label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
                            </th>
                            <td class="forminp">
                             <input name="<?php echo esc_attr( $options['id'] ); ?>" id="<?php echo esc_attr( $options['id'] ); ?>" type="text" class="demo"  data-opacity="0.50" data-format="rgb" value="<?php echo esc_attr( $option_value ); ?>"/>
                            </td>
                    </tr>
                    <?php
            } 
                
            private function option_image($options){

                    $option_value = get_option( $options['id'], $options['default'] );

                            ?>
                            <tr valign="top" class="ct-user-form-option-media">
                                    <th scope="row" class="titledesc">
                                            <label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
                                            <td class="forminp">
                                                <input name="<?php echo esc_attr( $options['id'] ); ?>" id="<?php echo esc_attr( $options['id'] ); ?>" type="text" value="<?php echo esc_attr( $option_value ); ?>"/>
                                                <button type="button" class="button button-primary"><span class="dashicons dashicons-admin-media"></span></button>
                                            </td>
                                    </th>
                            </tr>
                            <?php
            }

            private function option_layout($options){

                    $option_value = get_option( $options['id'], $options['default'] );

                    ?>
                    <tr valign="top" class="ct-user-form-option-layout">
                                    <th scope="row" class="titledesc">
                                            <label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
                                            <td class="forminp">
                                                    <ul>
                                                            <?php $template = up_get_template_list();
                                                            foreach ($template as $value): ?>

                                                            

                                                            <?php endforeach; ?>
                                                    </ul>
                                                    <input name="<?php echo esc_attr( $options['id'] ); ?>" type="hidden" id="<?php echo esc_attr( $options['id'] ); ?>" type="text" value="<?php echo esc_attr( $option_value ); ?>"/>
                                            </td>
                                    </th>
                            </tr>
                    <?php
            }   
		 /**
		  * Switch Option.
		  * 
		  * @copyright http://codepen.io/BandarRaffah/pen/ibwje
		  * @param array() $options
		  */
         private  function option_switch($options)
         {
         	
         	$option_value = get_option( $options['id'], $options['default'] );
         	
         	?>
         	<tr valign="top" class="ct-user-form-option-switch">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $options['id'] ); ?>"><?php echo esc_html( $options['title'] ); ?></label>
				</th>
				<td class="forminp">
					<label><input type="checkbox" class="ios-switch green"<?php if($option_value) { echo ' checked="checked"'; } ?>/><div class="switch"><div></div></div></label>
					<input name="<?php echo esc_attr( $options['id'] ); ?>" id="<?php echo esc_attr( $options['id'] ); ?>" type="hidden" value="<?php echo esc_attr( $option_value ); ?>"/>
				</td>
			</tr>
         	<?php
         }
	}

	new Case_Theme_User_admin ();
}